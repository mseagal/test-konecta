@extends('adminlte::page')
@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Editar Producto - {{ $product->name }}</h1>
        </div>
    </div>
@stop

@section('content')
    @include('layout.flash-messages')
    <form action="{{ route('products.update',['product' => $product->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="modal-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Nombre</label>
                  <input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre" value="{{ old('name',$product->name) }}">
                  @error('name')
                    <small class="text-red">* {{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="inputRef">Referencia</label>
                  <input type="text" class="form-control" id="inputRef" name="ref" placeholder="Referencia" value="{{ old('ref',$product->ref) }}">
                  @error('ref')
                    <small class="text-red">* {{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputPrice">Precio</label>
                    <input type="number" class="form-control" id="inputPrice" name="price" placeholder="Precio" value="{{ old('price',$product->price) }}">
                    @error('price')
                        <small class="text-red">* {{ $message }}</small>
                    @enderror                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputWeight">Peso</label>
                    <input type="text" class="form-control" id="inputWeight" name="weight" placeholder="Peso" value="{{ old('weight',$product->weight) }}">
                    @error('weight')
                        <small class="text-red">* {{ $message }}</small>
                    @enderror 
                  </div>
                </div>
              <div class="form-group">
                  <select class="custom-select" id="inputCategory" name="category_id" value="{{ old('category_id',$product->category_id) }}">
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{$category->id == $product->category_id ? 'selected' : ''}}> {{ $category->name }} </option>   
                    @endforeach
                  </select>
              </div>
            
        </div>
        <div class="modal-footer">
          <a href="{{ back() }}" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
@stop