<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalController extends Controller
{
    public function payWithPayPal()
    {
        $order = new Order();
        $order->id_user = Auth::user()->number_document;
        $order->impuesto = Cart::tax();
        $order->subtotal = Cart::subtotal();
        $order->total = Cart::total();
        $order->status = 'pending';
        $order->discount = 0;
        $order->date_order = date('Y-m-d h:m:s');
        $order->payment_status = 'pending';
        $order->payment_method = 'paypal';
        $order->save();
    
        foreach (Cart::content() as $item) {
            $detail = new Detail();
            $detail->order_id = $order->id;
            $detail->product_id = $item->id;
            $detail->price = $item->price;
            $detail->quantity = $item->qty;
            $detail->save();
        }
    
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());
    
        $paypalOrder = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal-status', ['order_id' => $order->id]),
                "cancel_url" => route('paypal-status', ['order_id' => $order->id]),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($order->total, 2, '.', ''),
                    ]
                ]
            ]
        ]);
    
        $order->payment_id = $paypalOrder['id'];
        $order->save();
    
        Cart::destroy();
        return redirect($paypalOrder['links'][1]['href']);
    }
    

  public function getPaymentStatus(Request $request)
{
    // Obtén los datos de la URL (token y PayerID son claves para capturar el pago)
    $token = $request->query('token');
    $payerId = $request->query('PayerID');
    $orderId = $request->query('order_id');

    // Verifica que los parámetros necesarios estén presentes
    if (!$token || !$payerId || !$orderId) {
        return redirect('/')->with('error', 'Faltan datos en la respuesta de PayPal.');
    }

    // Buscar la orden en la base de datos por el ID
    $order = Order::find($orderId);
    if (!$order) {
        return redirect('/')->with('error', 'Orden no encontrada.');
    }

    // Configura el proveedor de PayPal
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $provider->setAccessToken($provider->getAccessToken());

    // Intentar capturar el pago con el token proporcionado
    try {
        $response = $provider->capturePaymentOrder($token);

        // Verifica el estado de la respuesta de PayPal
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Actualiza el estado del pago en la base de datos
            $order->payment_status = 'completed';
            $order->save();

            // Redirigir al usuario con un mensaje de éxito
            return redirect('/')->with('success', 'Pago completado exitosamente.');
        } else {
            // Si el pago no fue completado
            return redirect('/')->with('error', 'No se pudo completar el pago. Inténtalo nuevamente.');
        }
    } catch (\Exception $e) {
        // Si hay un error en el proceso de captura del pago
        return redirect('/')->with('error', 'Ocurrió un error al procesar el pago: ' . $e->getMessage());
    }
}

    
}
