document.addEventListener("DOMContentLoaded", function() {
    // Aguarda um micro momento para garantir que tudo foi renderizado
    setTimeout(function() {
        const categories = document.querySelectorAll(".category");
        
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