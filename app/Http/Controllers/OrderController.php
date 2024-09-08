<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show($id) 
    {
        $order=Order::find($id);
        return response()->json(
        [
            'total'=>$order-> total,
        ],200);
    }

 /*    public function show($id)
{
    // Buscar la orden por id
    $order = Order::find($id);

    // Verificar si la orden existe
    if (!$order) {
        return response()->json(['error' => 'Order not found'], 404);
    }

    // Devolver la respuesta
    return response()->json([
        'total' => $order->total,
    ], 200);
} */

  
}
