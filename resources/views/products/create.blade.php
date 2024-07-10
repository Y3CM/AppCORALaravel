@extends('layouts.template')

@section('title','cora | crear producto ')
@section('header')
@include('components.NavBar')
@endsection

@section('content')
<div class="container" style="margin-top:100px; margin-bottom:20px">
  <h1 style="margin: 10px">Aqui puedes agregar tus productos</h1>
<form class="row g-3 needs-validation" novalidate action="{{route('products.store')}}" method="POST">
    @csrf
    <div class="col-md-4 position-relative">
      <label for="name" class="form-label">nombre del producto</label>
      <input type="text" class="form-control" id="name" name="name" required>
      <div class="valid-tooltip">
        Ok!
      </div>
    </div>
    <div class="col-md-4 position-relative">
      <label for="validationTooltip04" class="form-label">Elige una categoria</label>
      <select class="form-select" id="category_id" name="category_id" required>
        @foreach ($categories as $category)
        <option value="{{$category->id}}" >{{$category->nombre}}</option>
        @endforeach
      </select>
      <div class="invalid-tooltip">
        por favor selecciona una opcion
      </div>
    </div>
    <div class="col-md-12 position-relative">
      <label for="description" class="form-label">Descripción</label>
     <textarea  class="form-control" id="description" name="description"  required></textarea>
      <div class="valid-tooltip">
        Ok!
      </div>
    </div>
    <div class="col-md-3 position-relative">
      <label for="price" class="form-label">Precio</label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="validationTooltipUsernamePrepend">$</span>
        <input type="number" class="form-control" name="price" id="price" aria-describedby="validationTooltipUsernamePrepend" required>
        <div class="valid-tooltip">
          Ok!
        </div>
      </div>
    </div>
    <div class="col-md-3 position-relative">
      <label for="stock" class="form-label">Stock</label>
      <input type="number" class="form-control" name="stock" id="stock" required>
      <div class="valid-tooltip">
        Ok!
      </div>
    </div>
    <div class="col-md-6 position-relative">
      <label for="validationTooltip04" class="form-label">Tipo de imagen</label>
      <select class="form-select" id="image_type" name="image_type" required>
        <option value="file" >Subir archivo</option>
        <option value="url">Proporcionar URL</option>
      </select>
      <div class="invalid-tooltip">
        por favor selecciona una opcion
      </div>
    </div>

    <div class="col-md-6 position-relative">
        <div id="file_input">
            <label for="image_file">Imagen del producto:</label>
            <input type="file" name="image_file" id="image_file" >
        </div>
      <div class="invalid-tooltip">
        Please provide a valid zip.
      </div>
    </div>

    <div class="col-md-3 position-relative">
        <div id="url_input">
            <label for="image_url">URL de la imagen del producto:</label>
            <input type="url" name="image_url" id="image_url">
        </div>
      <div class="invalid-tooltip">
        Please provide a valid zip.
      </div>
    </div>
 
    <div class="col-12">
      <a href="{{ url()->previous() }}" class="btn btn-outline-danger" ><i class="fas fa-arrow-left"></i> Regresar</a>
      <button class="btn btn-success" type="submit">Crear Producto</button>
    </div>
  </form>
  
</div>
  @endsection
  @section('footer')
  <x-Footer/>
  @endsection


