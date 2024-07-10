@extends ('layouts.template')

@section('title','cora | create post')

@section('header')
    <x-NavBar/>
    @endsection

    @section('content')
    <div class="container">
    <a href="{{route('posts.index')}}">volver</a> 
 <h1>Formulario para crear un posts</h1>
 <br><br>
<form action="{{route('posts.store')}}" method="post">   
@csrf
 <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Titulo</span>
  <input type="text" class="form-control" name="title" placeholder="Titulo" aria-label="Username" aria-describedby="basic-addon1">
</div>
 
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Slug</span>
  <input type="text" class="form-control" name="slug" placeholder="Slug" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <input type="text" class="form-control" name="category" placeholder="categoria" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class="input-group-text" id="basic-addon2">Categoria</span>
</div>

<div class="input-group">
  <span class="input-group-text">Contenido</span>
  <textarea class="form-control" aria-label="With textarea" name="content"></textarea>
</div>
<br>
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
    <button class="btn btn-success " type="submit">Crear Post</button>
  </div>
</div>
</form>
    @endsection
