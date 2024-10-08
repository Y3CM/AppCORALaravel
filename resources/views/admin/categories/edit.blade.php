@extends('adminlte::page')

@section('title', 'editar  categoria')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <a class="btn btn-outline-warning" style="margin: 10px" href="{{ url()->previous() }}">volver</a>
    <h1 style="margin-bottom: 10px"><span>Edit</span> categoria</h1>
<form class="row g-3 needs-validation"  action="{{route('categories.update',$category)}}" method="POST" novalidate >
    @method('PUT')
    @csrf
    <div class="col-md-4">
      <label for="nombre" class="form-label">Nombre de categoria</label>
      <input type="text" class="form-control"name="nombre" value='{{$category->nombre}}' id="nombre"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-12">
      <label for="descripcion" class="form-label">Descripcion</label>
      <textarea type="text" class="form-control" cols="30" rows="3" id="descripcion" name="descripcion" required>{{$category->descripcion}}</textarea>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-12" style="margin-bottom: 10px">
      <button class="btn btn-outline-success" type="submit">Actualizar Categoria</button>
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