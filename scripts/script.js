document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('scroll', function() {
        const scrollLink = document.querySelector('#scrollLink');
        if (window.scrollY > 100) {  // Mostrar el enlace después de 100px de desplazamiento
            scrollLink.classList.add('show');
        } else {
            scrollLink.classList.remove('show');
        }
    });
})