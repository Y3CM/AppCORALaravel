@extends('layouts.template')

@section('title','cora | productos')

   @section ('header')
   @include('components.NavBar')
   @endsection
   
   @section ('content')
   <div class="container" style="margin-top: 100px">
    
    <x-alert type='info'>Aqui se mostraran los productos de la categoria {{$category->nombre}}</x-alert>


        @foreach ($products as $product)
        @if($category->id == $product->category_id)
        <x-CardProduct :products="$products"/>
        
        @endif
        @endforeach
        
        
    </div>
    
    </div>
@endsection
@section('footer')
<x-Footer/>
@endsection
