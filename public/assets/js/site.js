document.addEventListener('DOMContentLoaded', () => {

    const reveals =
        document.querySelectorAll('.reveal');

    function revealOnScroll(){

        reveals.forEach(element => {

            const top =
                element.getBoundingClientRect().top;

            if(top < window.innerHeight - 100){

                element.classList.add('active');

            }

        });

    }

    window.addEventListener('scroll', revealOnScroll);

    revealOnScroll();

});