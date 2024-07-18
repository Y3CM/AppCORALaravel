@extends('adminlte::page')

@section('title', 'crear categoria')

@section('content_header')
    
@stop

@section('content')
<div class="container" style="margin-top: 100px; " >
    <h1 style="margin-bottom: 10px"><span>Nueva</span> categoria</h1>
<form class="row g-3 needs-validation"  action="{{route('categories.store')}}" method="POST" novalidate >
    @csrf
    <div class="col-md-4">
      <label for="nombre" class="form-label">Nombre de categoria</label>
      <input type="text" class="form-control"name="nombre"  id="nombre"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-12">
      <label for="descripcion" class="form-label">Descripcion</label>
      <textarea type="text" class="form-control" cols="30" rows="3" id="descripcion" name="descripcion" required></textarea>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-12" style="margin-top: 10px">
      <button class="btn btn-outline-success" type="submit">Crear Categoria</button>
    </div>
  </form>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop