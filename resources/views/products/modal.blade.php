<x-modal modalId="modalProduct" modalTitle="Productos" modalSize="modal-lg">
    <form wire:submit={{ $Id == 0 ? 'store' : "update($Id)" }}>
        <div class="form-row">
            {{-- input name --}}
            <div class="form-group col-md-7">
                <label for="name">Nombre:</label>
                <input wire:model='name' type="text" class="form-control" placeholder="Nombre categoria" id="name">
                @error('name')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- select category --}}
            <div class="form-group col-md-5">
                <label for="category_id">Categoria:</label>
                <select wire:model='cateogory_id' id="category_id" class="form-control">
                    <option value="0">Elija una opción</option>
                </select>
                @error('category_id')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- Textarea description --}}
            <div class="form-group col-md-12">
                <label for="descripcion">Descripcion:</label>

                <textarea wire:model='descripcion' id="descripcion" class="form-control" rows="3">

                </textarea>
                @error('descripcion')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- input precio compra --}}
            <div class="form-group col-md-4">
                <label for="precio_compra">Precio compra:</label>
                <input wire:model='precio_compra' type="number" class="form-control" placeholder="Precio compra"
                    id="precio_compra">
                @error('precio_compra')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- input precio venta --}}
            <div class="form-group col-md-4">
                <label for="precio_venta">Precio venta:</label>
                <input wire:model='precio_venta' type="number" class="form-control" placeholder="Precio venta"
                    id="precio_venta">
                @error('precio_venta')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- input codigo barras --}}
            <div class="form-group col-md-4">
                <label for="codigo_barras">Codigo barras:</label>
                <input wire:model='codigo_barras' type="text" class="form-control" placeholder="Codigo barras"
                    id="codigo_barras">
                @error('codigo_barras')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- input stock --}}
            <div class="form-group col-md-4">
                <label for="stock">Stock</label>
                <input wire:model='stock' type="number" class="form-control" placeholder="stock"
                    id="stock">
                @error('stock')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

             {{-- input stock minimo --}}
             <div class="form-group col-md-4">
                <label for="stock_minimo">Stock minimo</label>
                <input wire:model='stock_minimo' type="number" class="form-control" placeholder="stock minimo"
                    id="stock_minimo">
                @error('stock_minimo')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

             {{-- input fecha vencimiento --}}
             <div class="form-group col-md-4">
                <label for="fecha_vencimiento">Stock minimo</label>
                <input wire:model='fecha_vencimiento' type="date" class="form-control" placeholder="Fecha vencimiento"
                    id="fecha_vencimiento">
                @error('fecha_vencimiento')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- checkbox active --}}
            <div class="form-group col-md-3">
                <div class="icheck-primary">
                    <input wire:model='active' type="checkbox" id="active">
                    <label for="active">¿Esta activo?</label>
                </div>
                
                @error('active')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

             {{-- input image --}}
             <div class="form-group col-md-3">
                <label for="image">Imagen</label>
                <input wire:model='image' type="file" id="image" accept="image/*">
                @error('image')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- imagen --}}
            <div class="form-group col-md-6">
                <img src="" alt="">
            </div>

        </div>
        <hr>
        <button type="submit" class="btn btn-primary float-right">{{ $Id == 0 ? 'Guardar' : 'Editar' }}</button>
    </form>
</x-modal>
