@if($showModal)
<div class="modal active">

    <div class="modal-box">

        <h2>
            {{ $employee_id ? 'Editar Funcionário' : 'Novo Funcionário' }}
        </h2>

        <input
            type="text"
            wire:model="name"
            placeholder="Nome"
        >

        <input
            type="text"
            wire:model="phone"
            placeholder="Telefone"
        >

        <input
            type="text"
            wire:model="bi"
            placeholder="BI"
        >

        <select wire:model="gender">
            <option>Masculino</option>
            <option>Feminino</option>
        </select>

        <select wire:model="service">
            <option>Coleta</option>
            <option>Limpeza</option>
            <option>Reciclagem</option>
        </select>

        <button wire:click="save" class="save-btn">
            Salvar
        </button>

        <button
            wire:click="$set('showModal', false)"
            class="close">
            Fechar
        </button>

    </div>

</div>
@endif