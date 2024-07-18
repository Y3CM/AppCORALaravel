@extends('adminlte::page')

@section('title', 'verificar posts')

@section('content_header')
    
@stop

@section('content')

    <h1 style="margin-bottom: 20px; color:rgb(40, 255, 40)">Publicaciones</h1>
    <x-CardPost :posts="$posts"/>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop