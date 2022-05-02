@extends('adminlte::page')
@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Ventas</h1>
        </div>
    </div>
@stop

@section('content')
@include('layout.flash-messages')
    <div class="container">
        <form class="form-inline d-flex justify-content-center" action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="form-group col-7">
                <label for="inputProductId" class="sr-only">Id Producto</label>
                <input type="number" class="form-control col-12" id="inputProductId" name="product_id" placeholder="Id Producto">
                @error('product_id')
                    <small class="text-red">* {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-3">
                <label for="inputQuantity" class="sr-only">Cantidad</label>
                <input type="number" class="form-control" id="inputQuantity" name="quantity" placeholder="Cantidad">
                @error('quantity')
                    <small class="text-red">* {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-2">
                <button type="submit" class="btn btn-success mb-2">Vender</button>
            </div>
        </form>
    </div>
    <hr width="100">
    <div class="container">
        <div class="col-12 text-center">
            <h3>Últimas ventas</h3>
        </div>
        <div class="col-6 m-auto text-center">
            <ul class="p-0" style="list-style: none" >
                @foreach ($sales as $sale)
                    <li>{{ $sale->created_at }} &nbsp;&nbsp; {{ $sale->product->id }} &nbsp; {{ $sale->product->name }}</li> 
                @endforeach
                @if ($sales->count() < 1)
                    <span>No hay ventas</span>
                @endif
            </ul>
        </div>
    </div>
@stop

@section('css')
    @include('layout.bootstrap-css')
@stop

@section("js")
    @include('layout.bootstrap-js')
@stop