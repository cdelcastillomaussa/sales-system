<div>
    <x-card cardTitle="Listado productos ({{ $this->recordsTotal }})">
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary small btn-sm" wire:click='create'><i class="fas fa-plus-circle mr-1"></i>Crear producto</a>
        </x-slot>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio venta</th>
                <th>Stock</th>
                <th>Categoria</th>
                <th>Estado</th>
                <th width="3%">...</th>
                <th width="3%">...</th>
                <th width="3%">...</th>

            </x-slot>

            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>imagen</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->precio_venta }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>Active</td>

                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-success btn-sm" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" wire:click='edit({{ $product->id }})' class="btn btn-primary btn-sm" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a wire:click="$dispatch('delete', {id: {{ $product->id }}, eventName: 'destroyProduct'})" class="btn btn-danger btn-sm" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

            @empty
                <tr class="text-center">
                    <td colspan="10">
                        Sin registros
                    </td>
                </tr>
            @endforelse

        </x-table>

        <x-slot:cardFooter>
            {{ $products->links() }}
        </x-slot>
    </x-card>

    @include('products.modal')


</div>
