<div>
    <x-card cardTitle="Listado categorias ({{ $this->recordsTotal }})">
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

            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="#" class="btn btn-success btn-xs" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" wire:click='edit({{ $category->id }})' class="btn btn-primary btn-xs" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-xs" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

            @empty
                <tr class="text-center">
                    <td colspan="5">
                        Sin registros
                    </td>
                </tr>
            @endforelse

        </x-table>

        <x-slot:cardFooter>
            {{ $categories->links() }}
        </x-slot>
    </x-card>

    <x-modal modalId="modalCategory" modalTitle="Categorias">
        <form wire:submit={{ $Id == 0 ? "store" : "update($Id)" }}>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="name">Nombre:</label>
                    <input wire:model='name' type="text" class="form-control" placeholder="Nombre categoria" id="name">
                    @error('name')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary float-right">{{ $Id == 0 ? 'Guardar' : 'Editar' }}</button>
        </form>
    </x-modal>
</div>
