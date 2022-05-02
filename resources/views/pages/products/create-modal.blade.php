<div class="modal fade" style="animation-fill-mode: unset;" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Agregar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('products.store') }}" method="POST">
          <div class="modal-body">
              @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputName">Nombre</label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre" value="{{ old('name') }}">
                    @error('name')
                      <small class="text-red">* {{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputRef">Referencia</label>
                    <input type="text" class="form-control" id="inputRef" name="ref" placeholder="Referencia" value="{{ old('ref') }}">
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputPrice">Precio</label>
                      <input type="number" class="form-control" id="inputPrice" name="price" placeholder="Precio" value="{{ old('price') }}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputWeight">Peso</label>
                      <input type="text" class="form-control" id="inputWeight" name="weight" placeholder="Peso" value="{{ old('price') }}">
                    </div>
                  </div>
                <div class="form-group">
                    <select class="custom-select" id="inputCategory" name="category_id" value="{{ old('category_id') }}">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" > {{ $category->name }} </option>   
                      @endforeach
                    </select>
                </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
</div>