@push('styles')
    @vite('resources/css/admin/services.css')
@endpush

<div class="dashboard">

    @include('livewire.admin.partials.sidebar')

    <main class="main">
        {{-- @include('livewire.admin.partials.topbar') --}}

        <div class="services-page">
            @include('livewire.admin.partials.services.top')
            @include('livewire.admin.partials.services.filters')
            @include('livewire.admin.partials.services.table')
        </div>
    </main>
<script>
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        const categories = document.querySelectorAll(".category");
        
        if (categories.length === 0) {
            console.log("Nenhuma categoria encontrada");
            return;
        }
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        }, { threshold: 0.15 });
        
        categories.forEach(function(category) {
            observer.observe(category);
        });
    }, 100);
});
</script>
    @include('livewire.admin.partials.services.modal')

</div>