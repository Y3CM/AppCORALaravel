<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        /* $request->validate([
            'content' => 'required|string',
        ]); */
        $product->reviews()->create([
            'review' => $request->review,
            'user_id' => Auth::user()->number_document,
            'rating' => $request->rating,
            'product_id' => $product->id
        ]);
        return back();
    }
}
