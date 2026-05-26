@foreach($categories as $category)
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
                        <span class="status active">Activo</span>
                    </td>
                    <td>
                        <button class="edit">Editar</button>
                        <button class="toggle">Desactivar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endforeach