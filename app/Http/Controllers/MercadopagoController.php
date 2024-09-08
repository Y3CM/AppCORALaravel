<?php

namespace App\Http\Controllers;

use MercadoPago\SDK;
use MercadoPago\Preference;
use App\Models\Order;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Client as GuzzleClient;



class MercadopagoController extends Controller
{
    public function payWithMercadoPago()
    {
        $order = new Order();
        $order->id_user = Auth::user()->number_document;
        $order->impuesto = Cart::tax();
        $order->subtotal = Cart::subtotal();
        $order->total = Cart::total();
        $order->status = 'pending';
        $order->discount = 0;
        $order->date_order = date('Y-m-d h:i:s'); // Corrige el formato de fecha
        $order->payment_status = 'pending';
        $order->payment_method = 'mercadopago';
        $order->save();

        foreach (Cart::content() as $item) {
            $detail = new Detail();
            $detail->order_id = $order->id;
            $detail->product_id = $item->id;
            $detail->price = $item->price;
            $detail->quantity = $item->qty;
            $detail->save();
        }
            


        // Configurar MercadoPago
        SDK::setAccessToken(config('services.mercadopago.access_token'));

        // Configurar Guzzle para ignorar SSL
        SDK::setHttpClient(new GuzzleClient([
            'verify' => false // Ignorar problemas de certificado SSL
        ]));

        $preference = new Preference();

        $item = new \MercadoPago\Item();
        $item->title = 'Compra en mi tienda';
        $item->quantity = 1;
        $item->unit_price = $order->total;
        $preference->items = [$item];

        $preference->back_urls = [
            "success" => route('mercadopago-status', ['order_id' => $order->id]),
            "failure" => route('mercadopago-status', ['order_id' => $order->id]),
            "pending" => route('mercadopago-status', ['order_id' => $order->id])
        ];
        $preference->auto_return = "approved";

        $preference->save();

        $order->payment_id = $preference->id;
        $order->save();

        Cart::destroy();
        return redirect($preference->init_point);
    }

    public function getPaymentStatus(Request $request)
    {
        $orderId = $request->query('order_id');

        // Buscar la orden en la base de datos por el ID
        $order = Order::find($orderId);
        if (!$order) {
            return redirect('/')->with('error', 'Orden no encontrada.');
        }

        // Configura el SDK de MercadoPago
        SDK::setAccessToken(config('services.mercadopago.access_token'));

        // Obtener la preferencia usando el ID
        $preference = Preference::find_by_id($order->payment_id);

        // Verifica el estado del pago
        $status = $preference->status; // Puede ser 'approved', 'pending', 'rejected', etc.

        if ($status === 'approved') {
            // Actualiza el estado del pedido en la base de datos
            $order->payment_status = 'completed';
            $order->save();

            // Redirigir con éxito
            return redirect('/')->with('success', 'Pago completado exitosamente.');
        } else {
            // Si el pago no fue completado
            return redirect('/')->with('error', 'No se pudo completar el pago. Inténtalo nuevamente.');
        }
    }
}
