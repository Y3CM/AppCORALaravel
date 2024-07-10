@extends('layouts.template')

@section('title','cora | Producto')
@section('header')
@include('components.NavBar')
@endsection
@section('content')

        <div class="container mt-5" style="">
            <div class="card" style="margin-bottom: 50px; margin-top: 100px">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{$product->image_path}}" style="max-width: 100%;height: 100%" class="img-fluid rounded-start" alt="{{$product->name}}">
                      </div>
                    <div class="col-md-5">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <p class="card-text"><strong>Precio:</strong> ${{$product->price}}</p>
                           
                            @if (auth()->user()->number_document==$product->id_user)
                            <form action="{{route('products.destroy', $product)}}" method="post" style="margin-bottom: 20px"> 
                                @method('DELETE')
                                @csrf
                                <a class="btn btn-outline-warning"  href="{{route('products.edit', $product)}}">Editar producto</a>
                                <button class="btn btn-outline-danger" type="submit">Eliminar producto</button>
                            </form>
                            @endif
                            <form action="{{route('agregaritem')}}" method="post" style="margin-bottom: 20px">
                                @csrf
                                <input type="hidden" name="id_product" value="{{$product->id}}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-outline-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentcolor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                    </svg> Agregar al carrito
                                </button>
                            </form>
                            <a href="{{route('products.index')}}" class="btn btn-outline-info" ><i class="fas fa-arrow-left"></i> Volver atrás</a>
                        </div>
                    </div>
                    <style>
                        .scroll{max-height: 250px; 
                            overflow-y: auto;}
                        
                    </style>
                    <div class="col-md-3">
                        <div class="scroll">
                        @if (count(Cart::content()))
                       
                            <p class="text-center">Resumen carrito</p>
                            <table class="table table-striped">
                                <tbody>
                                    <thead>
                                        <th>producto</th>
                                        <th>cantidad</th>
                                        <th>total</th>
                                    </thead>
                                    @foreach (Cart::content() as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->qty }} x {{ $item->price }}</td>
                                            <td>{{number_format($item->qty * $item->price)}}</td>
                                        </tr>
                                    @endforeach
                                    <tfoot>
                                    <tr>
                                        <td colspan="4"><b style="padding-right:46% ">SubTotal</b>  ${{Cart::SubTotal()}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><b style="padding-right:63% ">iva</b>  ${{ Cart::tax() }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><b style="padding-right:55% ">Total</b>  ${{ Cart::total() }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" ><a href="/comprar" class="btn btn-outline-info" >Comprar ahora</a></td>
                                    </tr>

                                </tfoot>
                                </tbody>
                            </table>
                       
                    @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
  
        @endsection
        @section('footer')
        <x-Footer/>
        @endsection