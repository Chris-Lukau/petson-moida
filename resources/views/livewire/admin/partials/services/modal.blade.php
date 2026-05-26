@if($showModal)
<div class="modal active">
    <div class="modal-box">

        <h2>Novo Serviço</h2>

        <select wire:model="category_id">
            <option value="">Categoria</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <input type="text" wire:model="name" placeholder="Nome">

        <input type="number" wire:model="base_price" placeholder="Preço">

        <select wire:model="pricing_type">
            <option value="fixed">fixed</option>
            <option value="hourly">hourly</option>
            <option value="monthly">monthly</option>
            <option value="m2">m2</option>
        </select>

        <button wire:click="save" class="save">
            Salvar
        </button>

        <button wire:click="$set('showModal', false)">
            Fechar
        </button>

    </div>
</div>
@endif