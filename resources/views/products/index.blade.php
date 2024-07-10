@extends('layouts.template')

@section('title','cora | productos')

   @section ('header')
   @include('components.NavBar')
   @endsection
   
   @section ('content')

   <img src="{{asset('images/descuento.png')}}" class="img-fluid"  alt="banner" >
   <div class="container mt-5" >
    
    <x-alert type='info'>Aqui se mostraran los productos</x-alert>

    <x-CardProduct :products="$products"/>
  
    </div>
@endsection
@section('footer')
<x-Footer/>
@endsection
