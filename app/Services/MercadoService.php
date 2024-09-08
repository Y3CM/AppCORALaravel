<?php

namespace App\Services;

use App\Exceptions\MercadoPagoException;
use App\Models\Order;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;
use Exception;
use Illuminate\Support\Facades\Log;

class MercadoService
{
    public function __construct()
    {
        try {
            $mpAccessToken = env('MERCADOPAGO_ACCESS_TOKEN');
            MercadoPagoConfig::setAccessToken($mpAccessToken);
        } catch (\Exception $e) {
            throw new MercadoPagoException('Error al configurar Mercado Pago: ' . $e->getMessage());
        }
    }

    /**
     * Obtiene el total de la compra para un pedido específico.
     *
     * @param int $id
     * @return float
     */
    public function getTotal($id)
    {
        try {
            $order = Order::findOrFail($id);
            return $order->total;
        } catch (Exception $e) {
            throw new Exception('Pedido no encontrado o error al obtener el total: ' . $e->getMessage());
        }
    }

    /**
     * Crea una preferencia de pago en Mercado Pago usando el total de la compra.
     *
     * @param int $orderId
     * @return mixed
     * @throws MercadoPagoException
     */
    public function createPreference($orderId)
    {
        // Obtener el total de la compra
        $total = $this->getTotal($orderId);

        // Crear la preferencia de pago en Mercado Pago
        $client = new PreferenceClient();

        try {
            $preference = $client->create([
                'external_reference' => $orderId,
                'items' => [
                    [
                        'title' => 'Compra en CORA', // Nombre descriptivo
                        'quantity' => 1, // Cantidad del ítem
                        'unit_price' => (float) $total, // Total de la compra
                    ],
                ],
                'back_urls' => [
                    'success' => route('payment.success'),
                    'failure' => route('payment.failure'),
                ],
                'auto_return' => 'approved',
                'payer_email' => 'user@example.com', // Puedes obtener esto desde el usuario autenticado
            ]);
        } catch (MPApiException $MPApiException) {
            Log::error('Error al crear preferencia en Mercado Pago', [
                'message' => $MPApiException->getMessage(),
                'status_code' => $MPApiException->getStatusCode(),
                'response' => $MPApiException->getApiResponse(),
            ]);
            throw new MercadoPagoException(
                'Error al crear la preferencia en Mercado Pago: ' . $MPApiException->getMessage(), 
                $MPApiException->getStatusCode()
            );
        }

        return $preference;
    }
}
