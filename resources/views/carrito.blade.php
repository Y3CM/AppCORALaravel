@extends('layouts.template')
@section('title','cora | carrito')
@section('header')
@include('components.NavBar')
@endsection
@section('content')
    <div class="container" style="margin-top: 100px" >
        <div class="row justify-content-center" >
            @if (count(Cart::content()))
                <div class="col-sm-8 bg-light" >
                    <table class="table table-striped">
                        <tbody>
                            <thead>
                                <th>Foto</th>
                                <th>Producto</th>
                                <th>Precio Unitario</th>
                                <th>cantidad</th>
                                <th>Precio Total</th>
                                <th>x</th>
                            </thead>
                            @foreach (Cart::content() as $item)
                                <tr>
                                    <td><a href="{{route('products.show',$item->id)}}"><img src="{{$item->options->imagen}}" width="100px" alt="{{ $item->name }}"></a></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                                            <a href="/decrementar/{{$item->rowId}}" class="btn btn-danger">-</a>
                                            <button type="button" class="btn btn-light">{{$item->qty}}</button>
                                            <a href="/incrementar/{{$item->rowId}}" class="btn btn-success">+</a>
                                          </div>
                                    </td>
                                    <td>{{number_format($item->qty * $item->price)}}</td>
                                    <td ><a href="{{route('eliminar',$item->rowId)}}" class="btn btn-sm text-danger">x</a></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6"><p class="text-end m-0 p-0">SubTotal COP {{Cart::SubTotal()}}</p></td>
                            </tr>
                            <tr>
                                <td colspan="6"><p class="text-end m-0 p-0">Impuesto 19% COP {{ Cart::tax() }}</p></td>
                            </tr>
                            <tr>
                                <td colspan="6"><p class="text-end m-0 p-0">Total COP {{ Cart::total() }}</p></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row justify-content-center" style="margin-bottom: 30px">
                        <div class="col-sm-4">
                            <a href="/eliminar" class="btn btn-outline-danger">Eliminar carrito</a>
                        </div>
                        <div class="col-sm-4">
                            @auth
                                <a href="{{route('paypal')}}" class="btn btn-outline-primary">PayPal</a>
                                <a href="{{route('mercadoPago')}}" class="btn btn-outline-info">Mercado Pago</a>
                                @else
                                 <a href="{{ route('login') }}" class="btn btn-info">Inicia sesión</a> 
                            @endauth
                        </div>
                    </div>
                </div>
                @else
                    <x-alert type='warning'>
                        no hay productos en el carrito
                    </x-alert>
                    
              <p style="margin-bottom: 145px"><a href="" class="btn btn-outline-info">Comprar ahora</a></p>
            
            @endif
        </div>
    </div>
@endsection
@section('footer')
<x-Footer/>
@endsection
