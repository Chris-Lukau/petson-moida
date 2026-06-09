document.addEventListener('DOMContentLoaded', () => {

    const carousel = document.getElementById('galeriaCarrossel');

    if(!carousel) return;

    const slides = document.querySelectorAll('.galeria-slide');

    let current = 0;

    const nextBtn = document.getElementById('btnNext');
    const prevBtn = document.getElementById('btnPrev');

    function updateCarousel(){

        carousel.style.transform =
            `translateX(-${current * 100}%)`;

    }

    nextBtn?.addEventListener('click', () => {

        current++;

        if(current >= slides.length){
            current = 0;
        }

        updateCarousel();

    });

    prevBtn?.addEventListener('click', () => {

        current--;

        if(current < 0){
            current = slides.length - 1;
        }

        updateCarousel();

    });

});