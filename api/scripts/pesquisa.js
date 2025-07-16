window.onload = function(){
    document.querySelectorAll('.filtro').forEach(filtro => {
        filtro.addEventListener('click', function(){
            let submenu = this.querySelector('.submenu-filtro');
            submenu.classList.toggle('active');
        });
    });

    document.querySelectorAll('.submenu-filtro input, .submenu-filtro .checkbox-opcao, .submenu-filtro p').forEach(element => {
        element.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });
}