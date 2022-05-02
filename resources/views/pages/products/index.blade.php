@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-6 col-sm-4 col-md-3 col-lg-1">
        <h1>Productos</h1>
    </div>
    <div class="col-6 pl-4">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createProductModal">
            Agregar Producto
        </button>
    </div>
</div>

@stop

@section('content')
@include('layout.flash-messages')
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Referencia</th>
        <th scope="col">Precio</th>
        <th scope="col">Peso</th>
        <th scope="col">Categoria</th>
        <th scope="col">Stock</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
          <tr>
              <td>{{ $product->id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->ref }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->weight }}</td>
              <td>{{ $product->category->name }}</td>
              <td>{{ $product->stock }}</td>
              <td>
                <div>
                    <form method="POST" action="{{ route('products.destroy',$product->id) }}">
                      @csrf
                      @method('DELETE')
                        <a class="btn btn-warning" href="{{ route('products.edit',['product'=>$product->id]) }}">Editar</a>
                        <a class="btn btn-info" href="{{ route('products.viewSupply',['product'=>$product->id]) }}">Surtir</a>
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                      </form>
                  </div>
              </td>
          </tr>
      @endforeach
    </tbody>
  </table>

  @include('pages.products.create-modal')
@stop

@section('css')
    @include('layout.bootstrap-css')
@stop

@section("js")
    @include('layout.bootstrap-js')
    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#createProductModal').modal('show');
        @endif
    </script>
@stop