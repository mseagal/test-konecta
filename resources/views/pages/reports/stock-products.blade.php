@extends('adminlte::page')
@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Reporte Stock de Productos</h1>
        </div>
    </div>
@stop

@section('content')
<div>
    <canvas id="myChart"></canvas>
</div>
@stop

@section('css')
    @include('layout.bootstrap-css')
@stop

@section("js")
    @include('layout.bootstrap-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = [
          'January',
          'February',
          'March',
          'April',
          'May',
          'June',
        ];
      
        const data = {
          labels: labels,
          datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
          }]
        };
      
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            },
        };
    </script>
    <script>
        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
    </script>
@stop