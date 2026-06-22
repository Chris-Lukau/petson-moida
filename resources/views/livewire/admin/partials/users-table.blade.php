<div class="table-container">

    <table>

        <thead>

            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Gênero</th>
                <th>Endereço</th>
                <th>Bairro</th>
                <th>Estado</th>
                <th>Última Recolha</th>
                <th>Ações</th>
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

                    <td>{{ $user->bairro }}</td>

                    <td>
                        <span class="badge {{ $user->active ? 'ativo' : 'inativo' }}">
                            {{ $user->active ? 'Ativo' : 'Inativo' }}
                        </span>
                    </td>

                    <td>
                        - {{-- {{ $user->ultima_recolha ?? '-' }} --}}
                    </td>

                    <td>

                        <button class="btn btn-info">
                            Ver Perfil
                        </button>

                        <button class="btn btn-warning">
                            Editar
                        </button>

                        <button class="btn btn-success">
                            Histórico
                        </button>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8">
                        Nenhum registro encontrado
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

    <div class="mt-4">
        {{ $usuarios->links() }}
    </div>

</div>
