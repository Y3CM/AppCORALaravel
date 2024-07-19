@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Chartjs',true)
    

@section('content_header')
    
@stop

@section('content')
    <p>Bienvenido al panel de administración de CORA </p>
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="max-width: 500px">
                <div class="card-header" style="background-color:lightblue ">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Productos</h4>
                    <canvas id="myChart"  ></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="max-width: 500px">
                <div class="card-header" style="background-color:lightgreen ">
                </div>
                <div class="card-body">
                    <h4 class="card-title">users</h4>
                    <canvas id="myChart2"  ></canvas>
                </div>
            </div>
        </div>
   
   
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop



@section('js')

@section('js')
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const ctx2 = document.getElementById('myChart2').getContext('2d');

    const data = {
  labels: [
    'Red',
    'Blue',
    'Yellow'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};


    

    new Chart(ctx, {
        type: 'doughnut',
        data: data,
    });

    new Chart(ctx2, {
        type: 'doughnut',
        data: data,
    });
</script>
@stop
   
@stop
