<div class="filtros">
    <input
        type="text"
        wire:model.live="search"
        placeholder="Pesquisar usuário"
    >

    <select wire:model.live="endereco">
        <option value="">Filtrar endereço</option>

        @foreach($enderecos as $item)
            <option value="{{ $item }}">
                {{ $item }}
            </option>
        @endforeach
    </select>
</div>