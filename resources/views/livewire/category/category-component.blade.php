<div>
    <x-card cardTitle="Listado categorias ({{ $this->recordsTotal }})" cardFooter="Card Footer">
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary small btn-sm" data-toggle="modal" data-target="#modalCategory">Crear
                categoria</a>
        </x-slot>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>Nombre</th>
                <th width="3%">...</th>
                <th width="3%">...</th>
                <th width="3%">...</th>

            </x-slot>

            <tr>
                <td>...</td>
                <td>...</td>
                <td>
                    <a href="#" class="btn btn-success btn-xs" title="Ver">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-primary btn-xs" title="Editar">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger btn-xs" title="Eliminar">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>



        </x-table>

    </x-card>

    <x-modal modalId="modalCategory" modalTitle="Categorias">
        <form wire:submit="store">
            <div class="row">
                <div class="col">
                    <input wire:model='name' type="text" class="form-control" placeholder="Nombre categoria">
                    @error('name')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary float-right">Guardar</button>
        </form>
    </x-modal>
</div>
