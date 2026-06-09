document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('registerModal');

    const openBtn =
        document.getElementById('registerBtn');

    const closeBtn =
        modal?.querySelector('.modal-close');

    openBtn?.addEventListener('click', e => {

        e.preventDefault();

        modal.classList.add('active');

    });

    closeBtn?.addEventListener('click', () => {

        modal.classList.remove('active');

    });

});