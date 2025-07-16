document.addEventListener('DOMContentLoaded', iniciarPagina);

function iniciarPagina(){
    iniciarHeader();
    iniciarNav();
    iniciarFooter();
}

function iniciarHeader(){
    const header = document.getElementById('header-principal');
    fetch('./header.php')
    .then(response => response.text())
    .then(data => {
        header.innerHTML = data;
        iniciarFuncionalidadeCarrinho();
    })
}

function iniciarNav(){
    const opcao_nav = document.getElementById('nav-principal');
    if(opcao_nav != null){
        classe_nav = 'opcao-nav';

        const links = [
            { href: 'paginaprincipal.php', text: 'Página Principal', class: classe_nav},
            { href: 'pesquisa.php', text: 'Catálogo', class: classe_nav},
            { href: 'paginadeajuda.php', text: 'Ajuda', class: classe_nav},
            { href: 'paginadecontato.php', text: 'Contato', class: classe_nav}
        ];

        links.forEach(iniciarOpcoesNav, opcao_nav);
    }
}

function iniciarOpcoesNav(link){
    const a = document.createElement('a');
    a.classList.add(link.class);
    a.href = link.href;
    a.textContent = link.text;
    a.addEventListener('click', navegar);
    this.appendChild(a);
}

function navegar(evento){
    evento.preventDefault();
    window.location.href = this.href;
}

function iniciarFooter(){
    const footer = document.getElementById('footer-principal');
    fetch('footer.html')
    .then(response => response.text())
    .then(data => {
        footer.innerHTML = data;
    })
}