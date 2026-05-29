@if($showModal)
<div class="modal active">
    <div class="modal-box">

        <h2>
            {{ $employee_id ? 'Editar Funcionário' : 'Novo Funcionário' }}
        </h2>

        {{-- ALERTA GERAL --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- NOME --}}
        <input
            type="text"
            wire:model.DEFER="name"
            placeholder="Nome"
        >

        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror

        {{-- TELEFONE --}}
        <input
            type="text"
            wire:model.defer="phone"
            placeholder="+244923456789"
        >

        @error('phone')
            <span class="error">{{ $message }}</span>
        @enderror

        {{-- BI --}}
        <input
            type="text"
            wire:model.defer="bi"
            placeholder="123456789LA042"
        >

        @error('bi')
            <span class="error">{{ $message }}</span>
        @enderror

        {{-- GÊNERO --}}
        <select wire:model.defer="gender">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
        </select>

        @error('gender')
            <span class="error">{{ $message }}</span>
        @enderror

        {{-- SERVIÇO --}}
        <select wire:model.defer="service_id">

            <option value="">
                Selecionar serviço
            </option>

            @foreach($services as $service)
                <option value="{{ $service->id }}">
                    {{ $service->name }}
                </option>
            @endforeach

        </select>

        @error('service_id')
            <span class="error">{{ $message }}</span>
        @enderror

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