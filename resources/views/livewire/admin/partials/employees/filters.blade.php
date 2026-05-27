<div class="filters">

    <input
        type="text"
        wire:model.live="search"
        placeholder="Pesquisar nome"
    >

    <select wire:model.live="genderFilter"> <!-- MUDE para genderFilter -->
        <option value="">Filtrar género</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
    </select>

    <select wire:model.live="serviceFilter"> <!-- MUDE para serviceFilter -->
        <option value="">Filtrar serviço</option>
        @foreach($services as $service)
            <option value="{{ $service->id }}">{{ $service->name }}</option>
        @endforeach
    </select>

</div>