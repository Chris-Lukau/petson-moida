@if($showModal)
<div class="modal active">
    <div class="modal-box">
        <h2>{{ $employee_id ? 'Editar Funcionário' : 'Novo Funcionário' }}</h2>

        {{-- Exibe erros de validação gerais (opcional) --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="text" wire:model="name" placeholder="Nome">
        @error('name') <span class="error">{{ $message }}</span> @enderror

        <input type="text" wire:model="phone" placeholder="Telefone (+2449XXXXXXXX)">
        @error('phone') <span class="error">{{ $message }}</span> @enderror

        <input type="text" wire:model="bi" placeholder="BI">
        @error('bi') <span class="error">{{ $message }}</span> @enderror

        <select wire:model.live="genderFilter">
            <option value="">Filtrar género</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
        </select>
        @error('gender') <span class="error">{{ $message }}</span> @enderror

        {{-- <select wire:model="service_id">
            <option value="">Selecionar serviço</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select> --}}
        <select wire:model.live="serviceFilter">
            <option value="">Filtrar serviço</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}">
                    {{ $service->name }}
                </option>
            @endforeach
        </select>
        @error('service_id') <span class="error">{{ $message }}</span> @enderror

        <button wire:click="save" class="save-btn">Salvar</button>
        <button wire:click="$set('showModal', false)" class="close">Fechar</button>
    </div>
</div>
@endif