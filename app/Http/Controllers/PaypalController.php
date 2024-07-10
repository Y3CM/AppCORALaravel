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
                        "value" => $order->total,
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
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());
    }
    
}
