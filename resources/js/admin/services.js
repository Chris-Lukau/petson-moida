function initAnimations() {
    document.querySelectorAll('.category').forEach(el => {
        el.classList.add('show');
    });
}

document.addEventListener('DOMContentLoaded', initAnimations);

document.addEventListener('livewire:initialized', () => {
    Livewire.hook('morph.updated', () => {
        initAnimations();
    });
});