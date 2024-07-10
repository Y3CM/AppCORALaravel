@extends('layouts.template')

@section('title','cora | posts')

   @section ('header')
   @include('components.NavBar')
   @endsection

   @section ('content')
   <div class="container " style="margin-top: 100px">

       <h1 style="color: springgreen">Bievenido al blog de CORA</h1>
       
        <a class="btn btn-success" style="margin-bottom: 30px" href="{{route('posts.create')}}"><i class="fa-solid fa-plus fa"></i> Publicar</a>
       
        <x-Video/>
    
        <x-alert type="info">
        Aqui se mostraran los posts
        </x-alert>
     
        <x-CardPost :posts="$posts"/>
    
    </div>
@endsection
@section('footer')  
<x-Footer/>
@endsection
