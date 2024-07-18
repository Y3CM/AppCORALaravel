@extends('layouts.template')

@section('title','cora | edit post' )

@section('header')
    @include('components.NavBar')
    @endsection

    @section('content')
    <div class="container">
    <a href="{{route('posts.show', $post)}}">volver</a> 
 <h1>Formulario para actualizar el  posts: {{$post->id}} </h1>
 <br><br>
<form action="{{route('posts.update',$post)}}" method="post">
    @method('put')
    @csrf
    
 <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Titulo</span>
  <input type="text" value="{{$post->title}}" class="form-control" name="title" placeholder="Titulo" aria-label="Username" aria-describedby="basic-addon1">
</div>
 
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Slug</span>
  <input type="text" class="form-control" value="{{$post->slug}}" name="slug" placeholder="Slug" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <input type="text" class="form-control" value="{{$post->category}}" name="category" placeholder="categoria" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class="input-group-text" id="basic-addon2">Categoria</span>
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Escribe un breve resumen</span>
  <textarea class="form-control" aria-label="With textarea" name="resumen">{{$post->resumen}}</textarea>
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Contenido</span>
  <textarea class="form-control" aria-label="With textarea" name="content">{{$post->content}}</textarea>
</div>

@if (auth()->user()->rol == 'admin')
<div class="input-group mb-3">
    <label for="is_published">Publicar:</label><div class="col-md-4 position-relative">
    <select name="is_published">
      <option value="0">pendiente</option>
      <option value="1">publicar</option>
    </select>
    </div>
@endif

<div class="col-md-3 position-relative">
    <div id="url_input">
        <label for="image_url">URL de la imagen:</label>
        <input type="url" value="{{$post->image}}" name="image" id="image_url">
    </div>
  <div class="invalid-tooltip">
    Please provide a valid zip.
  </div>
</div>

<br>
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
    <button class="btn btn-success " type="submit">actualizar Post</button>
  </div>
</div>
</form>
@endsection