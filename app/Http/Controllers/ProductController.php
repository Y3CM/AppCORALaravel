<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $products=Product::all();
        $categories=Categoria::all();

      
        return view('products.index',compact('products','categories'));
    }

    public function create()
    {
        $categories=Categoria::all();
        return view('products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image_type' => 'required|in:file,url',
            'image_file' => 'required_if:image_type,file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'required_if:image_type,url|url',
        ]);

        $imagePath = null;
        if ($request->image_type === 'file') {
            $imagePath = $request->file('image_file')->store('products', 'public');
        } else {
            $imagePath = $request->input('image_url');
        }

        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'id_user' => Auth::user()->number_document,
            'category_id' => $request->input('category_id'),
            'image_path' => $imagePath, // Guardar la ruta de la imagen o la URL
            'image_type' => $request->input('image_type'),
        ]);

        $product->save();

        return redirect()->route('products.index')->with('success', 'Producto creado satisfactoriamente');
    }

    public function show(Product $product, Categoria $category) 
    {
        $categories=Categoria::all();
        return view('products.show',compact('product','categories','category'));
    }

    public function edit(Product $product,Categoria $categories)
    {
        return view('products.edit',compact('product','categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'description' => 'required|string',
            'price' => 'required|numeric',
           'stock' => 'required|integer',
        ]);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        $product->save();

        return redirect()->route('products.index')->with('success', 'Producto actualizado satisfactoriamente');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }

    public function index1()
    {
        $products = Product::all(); 
        return view('index', compact('products'));
    }
}
