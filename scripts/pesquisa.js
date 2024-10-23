window.onload = function(){
    document.querySelectorAll('.filtro').forEach(filtro => {
        filtro.addEventListener('click', function(){
            console.log('Clique detectado!'); // Verifica se o clique é detectado
            
            let submenu = this.querySelector('.submenu-filtro');
            console.log(submenu); // Verifica se o submenu está sendo corretamente selecionado
            submenu.classList.toggle('active');
        });
    });

    document.querySelectorAll('.submenu-filtro input, .submenu-filtro .checkbox-opcao, .submenu-filtro p').forEach(element => {
        element.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });
}