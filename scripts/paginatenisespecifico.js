
const tamanhos = document.querySelectorAll('.tamanhos p');
let tamanhoSelecionado = null; 

tamanhos.forEach(tamanho => {
    tamanho.addEventListener('click', function() {
        if (this.classList.contains('selecionado')) {
            this.classList.remove('selecionado');
            tamanhoSelecionado = null; 
        } else {
            tamanhos.forEach(t => t.classList.remove('selecionado'));
            this.classList.add('selecionado');
            tamanhoSelecionado = this.textContent; 
        }
    });
});
