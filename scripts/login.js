const botaoCadastrar = document.getElementById('botaoCadastrar');
const botaoEntrar = document.getElementById('botaoEntrar');
const formCadastrar = document.getElementById('cadastrar');
const formEntrar = document.getElementById('entrar');

botaoCadastrar.addEventListener('click', function(){
    formEntrar.style.display = "none";
    formCadastrar.style.display = "block";
})

botaoEntrar.addEventListener('click', function(){
    formCadastrar.style.display = "none";
    formEntrar.style.display = "block";
})