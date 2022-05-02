@extends('adminlte::page')
@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Cargar Inventario - {{ $product->name }}</h1>
        </div>
    </div>
@stop

@section('content')
    @include('layout.flash-messages')
    <form action="{{ route('products.supply',['product' => $product->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="modal-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Cantidad</label>
                  <input type="number" class="form-control" id="inputName" name="stock" placeholder="Cantidad">
                  @error('stock')
                    <small class="text-red">* {{ $message }}</small>
                  @enderror
                </div>
              </div>
        </div>
        <div class="footer">
          <a href="{{ back() }}" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
@stop