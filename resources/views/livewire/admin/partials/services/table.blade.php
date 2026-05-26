@foreach($categories as $category)

    @if($category->services->count() > 0)

    <div class="category">
        <h2>{{ $category->name }}</h2>

        <div class="table-box">
            <table>
                <thead>
                    <tr>
                        <th>Serviço</th>
                        <th>Preço</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($category->services as $service)
                    <tr>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->base_price }} kz</td>
                        <td>{{ $service->pricing_type }}</td>
                        <td>
                            <span class="status {{ $service->active ? 'active':'inactive' }}">
                                {{ $service->active ? 'Activo':'Inactivo' }}
                            </span>
                        </td>
                        <td>
                            <button wire:click="edit({{ $service->id }})" class="edit">
                                Editar
                            </button>

                            <button wire:click="toggle({{ $service->id }})" class="toggle">
                                {{ $service->active ? 'Desactivar' : 'Activar' }}
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    @endif

@endforeach