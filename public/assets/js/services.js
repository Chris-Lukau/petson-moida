document.addEventListener('DOMContentLoaded', () => {

    const categoryFilter = document.getElementById('categoryFilter');
    const serviceSearch = document.getElementById('serviceSearch');

    if(!categoryFilter || !serviceSearch) return;

    serviceSearch.addEventListener('input', () => {

        console.log('Pesquisar:', serviceSearch.value);

    });

});