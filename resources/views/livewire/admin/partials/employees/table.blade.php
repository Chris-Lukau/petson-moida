{{-- <div class="table-box">
<table>

    <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>BI</th>
            <th>Gênero</th>
            <th>Serviço</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->bi }}</td>
            <td>{{ $employee->gender }}</td>
            <td>{{ $employee->service }}</td>

            <td>
                <button
                    wire:click="edit({{ $employee->id }})"
                    class="edit">
                    Editar
                </button>

                <button
                    wire:click="delete({{ $employee->id }})"
                    class="delete">
                    Eliminar
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
</div> --}}
<div class="table-box">
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>BI</th>
                <th>Género</th>
                <th>Serviço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->bi_number }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->service?->name ?? '—' }}</td>
                    <td>
                        <button wire:click="edit({{ $employee->id }})" class="edit">Editar</button>
                        <button wire:click="delete({{ $employee->id }})" class="delete"
                                onclick="return confirm('Tens a certeza?')">Eliminar</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhum funcionário encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>