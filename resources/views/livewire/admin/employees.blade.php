<div class="dashboard">

    @include('livewire.admin.partials.sidebar')

    <main class="main">

        @include('livewire.admin.partials.employees.top')

        @include('livewire.admin.partials.employees.filters')

        @include('livewire.admin.partials.employees.table')

        @include('livewire.admin.partials.employees.modal')

    </main>
</div>

{{-- Bloco para exibir mensagens flash --}}
@if(session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif