<div>
    <x-card cardTitle="Listado categorias ({{ $this->recordsTotal }})">
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary small btn-sm" wire:click='create'><i class="fas fa-plus-circle mr-1"></i>Crear categoria</a>
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
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-success btn-sm" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" wire:click='edit({{ $category->id }})' class="btn btn-primary btn-sm" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a wire:click="$dispatch('delete', {id: {{ $category->id }}, eventName: 'destroyCategory'})" class="btn btn-danger btn-sm" title="Eliminar">
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

    @include('categories.modal')
</div>
