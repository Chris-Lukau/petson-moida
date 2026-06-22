<div class="filtros">

    <input type="text" wire:model.live="search" placeholder="Pesquisar morador">

    <select wire:model.live="endereco">
        <option value="">Todos os endereços</option>

        @foreach ($enderecos as $item)
            <option value="{{ $item }}">
                {{ $item }}
            </option>
        @endforeach
    </select>

    <select wire:model.live="bairro">
        <option value="">Todos os bairros</option>

        @foreach ($bairros as $item)
            <option value="{{ $item }}">
                {{ $item }}
            </option>
        @endforeach
    </select>

    <select wire:model.live="zona">
        <option value="">Todas as zonas</option>

        @foreach ($zonas as $item)
            <option value="{{ $item }}">
                {{ $item }}
            </option>
        @endforeach
    </select>

    <select wire:model.live="estado">
        <option value="">Todos</option>
        <option value="Ativo">Ativo</option>
        <option value="Inativo">Inativo</option>
    </select>

</div>
