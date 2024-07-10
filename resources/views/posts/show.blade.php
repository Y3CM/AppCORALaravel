@extends('layouts.template')

@section('title','cora | post')

<style>
    .scroll-container {
    max-height: 400px; 
    overflow-y: auto;
    
}
</style>

@section('header')
    @include('components.NavBar')
@endsection

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-8">
                <a href="{{route('posts.index')}}">volver</a> 
                <h1>{{$post->title}}</h1>
                <img src="{{$post->image}}" class="img-fluid" alt="{{$post->title}}" >
                <p style="margin-top:20px ">
                    <b>autor:</b> {{$post->user->name ." ". $post->user->last_name}}<hr>
                    <b>Categoria:</b> {{$post->category}}
                </p>
                <p style="text-align: justify">
                    {{$post->content}}
                </p>
                @if (auth()->check() && (auth()->user()->id == $post->id_user || auth()->user()->rol == 'admin'))
                <a href="{{route('posts.edit', $post)}}" class="btn btn-warning" >edit post</a> <br><br>
              
                
                <form action="{{route('posts.destroy', $post)}}" method="post"> 
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">Eliminar post</button>
                    </form>
                @endif
                
            </div>
            <div class="col-4">
                <div class="scroll-container">
                    <h3>Ultimas publicaciones</h3>
            @foreach($posts as $post)
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{$post->image}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <a href="{{route('posts.show', $post)}}" class="card-title">{{$post->title}}</a>
                    <p class="card-text"><small class="text-body-secondary">{{$post->updated_at}} </small></p>
                    </div>
                </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
    @section('footer')
    <x-Footer/>
    @endsection
@endsection