<div class="filters">

    <input
        type="text"
        wire:model.live="search"
        placeholder="Pesquisar serviço"
    >

    <select wire:model.live="status">
        <option value="">Filtrar status</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>

</div>