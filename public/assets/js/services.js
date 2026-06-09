document.addEventListener('DOMContentLoaded', () => {

    const searchInput =
        document.getElementById('serviceSearch');

    const categoryFilter =
        document.getElementById('categoryFilter');

    const cards =
        document.querySelectorAll('.service-card');

    if (!searchInput || !categoryFilter) return;

    function filterServices() {

        const search =
            searchInput.value.toLowerCase();

        const category =
            categoryFilter.value;

        cards.forEach(card => {

            const name =
                card.dataset.name;

            const cardCategory =
                card.dataset.category;

            const matchName =
                name.includes(search);

            const matchCategory =
                category === '' ||
                cardCategory === category;

            card.style.display =
                matchName && matchCategory
                    ? ''
                    : 'none';

        });

    }

    searchInput.addEventListener(
        'input',
        filterServices
    );

    categoryFilter.addEventListener(
        'change',
        filterServices
    );

});