<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercadoPago\Preference;
use MercadoPago\SDK;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class CartController extends Controller
{
    public function agregaritem(Request $request)
    {
       
        $product = Product::find($request->input('id_product'));

        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 1,
            'weight' => 1,
            'options'=> [
                'imagen' => $product->image_path,
            ]
            
        ];

        Cart::add($item);
       
        return redirect(route( 'products.index'));
    }

    public function mostrarCarrito()
    {
        $product = Product::all();
        $categories = Categoria::all();
        return view('carrito',compact('categories','product'));
    }

     public function incrementarqty(Request $request)
     {
         $item=Cart::content()->where('rowId',$request->id)->first();
        Cart::update($request->id,['qty'=>$item->qty+1]);
        return redirect(route('carrito'));
     }

     public function decrementarqty(Request $request)
     {
        
        $item=Cart::content()->where('rowId',$request->id)->first();
        Cart::update($request->id,['qty'=>$item->qty-1]);
        return redirect(route('carrito'));

     }

     public function eliminarItem(Request $request ,)
     {
        Cart::remove($request->id);
        
        return redirect(route('carrito'));
     }

    public function eliminarCarrito()
    {
        Cart::destroy();
        return redirect(route('products.index'));
    }

   public function comprar()
   {
    $order =new Order();
    $order->id_user =Auth::user()->number_document;
    $order->impuesto= Cart::tax();
    $order->subtotal=Cart::subtotal();
    $order->total=Cart::total();
    $order->status='pending';
    $order->discount=0;
    $order->date_order= date('Y-m-d h:m:s');
    $order->save();

    foreach (Cart::content() as $item)
    {
        $detail = new Detail();
        $detail->order_id = $order->id;
        $detail->product_id = $item->id;
        $detail->price = $item->price;
        $detail->quantity = $item->qty;
        $detail->save();
    }

    Cart::destroy();
    return redirect(route('products.index'));
   }

}
