<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Product;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    public function index()

    {
        $categories = Categoria::all();
        return view('categories.index', compact('categories'));
       
    }

    public function create()
    {
        $categories = Categoria::all();
        return view('categories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' =>'required|string|max:50',
        ]);

        $category = new Categoria();
        $category->nombre = $request->input('nombre');
        $category->descripcion = $request->input('descripcion');
        $category->save();

        return redirect()->route('categories.index');
    }

    public function show(Categoria $category) {
        $products =  Product::all();
        $categories = Categoria::all();
        
        return view('categories.show',compact('products', 'categories','category'));
    }


    public function update(Request $request,Categoria $category)
    {
        
        $request->validate([
            'nombre' =>'required|string|max:50',
            'descripcion' =>'required|string|max:255',
        ]);
       $categories = Categoria::all();
        $category->update($request->all());

        return redirect()->route('categories.index',compact('category','categories'))->with('success', 'Category updated successfully.');
    }

    public function edit(Categoria $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function destroy(Categoria $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}


