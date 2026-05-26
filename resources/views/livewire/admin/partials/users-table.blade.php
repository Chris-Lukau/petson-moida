<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nome Completo</th>
                <th>Telefone</th>
                <th>Gênero</th>
                <th>Endereço</th>
            </tr>
        </thead>

        <tbody>
            @forelse($usuarios as $user)
                <tr>
                    <td>{{ $user->nome_completo }}</td>
                    <td>{{ $user->telefone }}</td>
                    <td>
                        <span class="badge {{ $user->genero == 'Masculino' ? 'masculino' : 'feminino' }}">
                            {{ $user->genero }}
                        </span>
                    </td>
                    <td>{{ $user->endereco }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum registro encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $usuarios->links() }}
    </div>
</div>