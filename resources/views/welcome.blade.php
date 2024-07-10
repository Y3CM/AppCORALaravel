@extends('layouts.template')

    @section('title','Cora | Bienvenido')
  

    @section('header')
        @include('components.NavBar')
    @endsection('header')

   
    @section('content')
        <x-Carrucel/>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-4">  
                    <x-card-button color="warning" url="{{route('posts.index')}}">
                        <x-slot name="title">
                            Blog
                        </x-slot>
                    <i class="fa-solid fa-book fa-xl"></i>
                    </x-card-button>
                </div>
                <div class="col-sm-4">
                    <x-card-button color="info">
                        <x-slot name="title">
                            Comentarios
                        </x-slot>
                    <i class="fa-solid fa-message fa-xl"></i>
                    </x-card-button>
                </div>
                <div class="col-sm-4">
                    <x-card-button color="success">
                        <x-slot name="title">
                            CoraLine
                        </x-slot>
                    <i class="fa-solid fa-question fa-xl"></i>
                    </x-card-button>
                </div>
     
            </div>
        </div>
        @endsection
    @section('footer')
    <x-Footer/>
    @endsection
   
