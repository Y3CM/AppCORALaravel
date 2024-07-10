<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
       $categories = Categoria::all();
        return view('welcome',compact('categories'));
    }
}
