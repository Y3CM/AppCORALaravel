<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Order;
// use App\Services\MercadoPagoService;
use App\Services\MercadoService;
use Illuminate\Http\JsonResponse;

class MercadoPago extends Controller
{
    protected $mercadoPagoService;

    public function __construct(MercadoService $mercadoPagoService)
    {
        $this->mercadoPagoService = $mercadoPagoService;
    }

    /**
     * Crea una preferencia de pago en Mercado Pago.
     *
     * @param int $orderId
     * @return JsonResponse
     */
    public function createPaymentPreference($orderId): JsonResponse
    {
        try {

            $order = Order::findOrFail($orderId);

            // Asegúrate de pasar el ID de la compra al servicio
            $preference = $this->mercadoPagoService->createPreference($order->id);

            // Retornar la ID de la preferencia creada
            return response()->json(['data' => ['id' => $preference->id]]);
        } catch (\Exception $e) {
            // Manejo de errores
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
