@extends('layouts.template')

@section('title','cora | categorias')

   @section ('header')
   @include('components.NavBar')
   @endsection
  
   @section ('content')
   
   <div class="container" style="margin-top: 100px" >
       <h1>Aqui se mostraran las categorias</h1>
       @auth
       @if (Auth::user()->rol == 'admin')
       <a class="btn btn-outline-success" style="margin: 15px 0 30px 0" href="{{route('categories.create')}}">nueva categoria</a>
        @endif     
       @endauth                                     
       <div class="row">
        
            @foreach($categories as $category)
            <div class="card text-bg-light mb-3 " style="max-width: 15rem; margin:15px">
                <a class="list-group-item list-group-item-info" href="{{route('categories.show',$category)}}"><div class="card-header">{{ $category->nombre }}</div> </a>
                <div class="card-body">
                  <h5 class="card-title">{{ $category->nombre }}</h5>
                  <p class="card-text" style="text-align: justify">{{$category->descripcion}}</p>
                 @auth
                 @if (Auth::user()->rol == 'admin')
                 <p> <a class="btn btn-warning" href="{{route('categories.edit', $category)}}"><i class="fa-solid fa-pen" ></i></a> 
                    <form action="{{route('categories.destroy', $category)}}" method="post"> 
                         @method('DELETE')
                         @csrf
                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form></p>
                        @endif
                 @endauth
                
                </div>
              </div>
            @endforeach

        </div>
    </div>

        @section('footer')
        <x-Footer/>
        @endsection
@endsection

