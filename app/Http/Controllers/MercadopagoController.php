<?php

namespace App\Http\Controllers;

use MercadoPago\SDK;
use MercadoPago\Preference;
use App\Models\Order;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;


class MercadopagoController extends Controller
{

public function payWithMercadoPago()
{
    $order = new Order();
    $order->id_user = Auth::user()->number_document;
    $order->impuesto =Cart ::tax();
    $order->subtotal =Cart ::subtotal();
    $order->total = Cart::total();
    $order->status = 'pending';
    $order->discount = 0;
    $order->date_order = date('Y-m-d h:m:s');
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

    SDK::setAccessToken(config('services.mercadopago.access_token'));

    $preference = new Preference();

    $item = new \MercadoPago\Item();
    $item->title = 'Compra en mi tienda';
    $item->quantity = 1;
    $item->unit_price = $order->total;
    $preference->items = array($item);

    $preference->back_urls = array(
        "success" => route('mercadopago-status', ['order_id' => $order->id]),
        "failure" => route('mercadopago-status', ['order_id' => $order->id]),
        "pending" => route('mercadopago-status', ['order_id' => $order->id])
    );
    $preference->auto_return = "approved";

    $preference->save();

    $order->payment_id = $preference->id;
    $order->save();

    Cart::destroy();
    return redirect($preference->init_point);
}

 public function getPaymentStatus()
{

}

}
