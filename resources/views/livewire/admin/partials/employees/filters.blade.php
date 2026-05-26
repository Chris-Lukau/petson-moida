<div class="filters">

    <input
        type="text"
        wire:model.live="search"
        placeholder="Pesquisar nome"
    >

    <select wire:model.live="gender">
        <option value="">Filtrar género</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
    </select>

    <select wire:model.live="service">
        <option value="">Filtrar serviço</option>
        <option value="Coleta">Coleta</option>
        <option value="Limpeza">Limpeza</option>
        <option value="Reciclagem">Reciclagem</option>
    </select>

</div>