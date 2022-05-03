@extends('adminlte::page')
@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Reporte - Productos más vendidos</h1>
        </div>
    </div>
@stop

@section('content')
<div style="width: 90%">
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

        var respData = ('<?php echo ($data) ?>');
        respData = JSON.parse(respData);
        
        const data = {
          labels: respData.map( item => `${item.product_id}-${item.product_name}`),
          datasets: [{
            label: 'Productos',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: respData.map( item => item.total)
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