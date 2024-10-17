document.addEventListener('DOMContentLoaded', iniciarPagina);

function iniciarPagina(){
    const opcao_nav = document.getElementById('nav-principal');

    const links = [
        { href: 'pagina-principal.html', text: 'Página Principal'},
        { href: 'pesquisa.html', text: 'Catálogo'},
        { href: 'paginadeajuda.html', text: 'Ajuda'},
        { href: 'paginadecontato.html', text: 'Contato'}
    ];

    links.forEach(iniciarOpcoesNav, opcao_nav);
}

function iniciarOpcoesNav(link){
    const a = document.createElement('a');
    a.href = link.href;
    a.textContent = link.text;
    a.addEventListener('click', navegar);
    this.appendChild(a);
}

function navegar(evento){
    evento.preventDefault();
    window.location.href = this.href;
}