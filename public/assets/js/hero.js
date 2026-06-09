document.addEventListener('DOMContentLoaded', () => {

    const counters = [
        { id: 'counter1', target: 500 },
        { id: 'counter2', target: 1200 },
        { id: 'counter3', target: 3500 },
        { id: 'counter4', target: 900 }
    ];

    counters.forEach(counter => {

        const el = document.getElementById(counter.id);

        if(!el) return;

        let value = 0;

        const interval = setInterval(() => {

            value += Math.ceil(counter.target / 100);

            if(value >= counter.target){
                value = counter.target;
                clearInterval(interval);
            }

            el.textContent = value;

        }, 20);

    });

});