document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('serviceModal');

    const openBtn =
        document.getElementById('solicitarServicoBtn');

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