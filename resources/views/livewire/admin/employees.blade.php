<div class="dashboard">

    @include('livewire.admin.partials.sidebar')

    <main class="main">

        {{-- @include('livewire.admin.partials.topbar') --}}

        @include('livewire.admin.partials.employees.top')

        @include('livewire.admin.partials.employees.filters')

        @include('livewire.admin.partials.employees.table')

        @include('livewire.admin.partials.employees.modal')

    </main>
</div>