
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


const botaoCompra = document.querySelector('.botao-compra p');
const carrinho = document.querySelector('.imagem-carrinho');
const contadorItensCarrinho = document.querySelector('.contador-itens-carrinho');

let contador = 0; 

botaoCompra.addEventListener('click', function() {
    if (tamanhoSelecionado) {
        carrinho.classList.add('vibrate');
        
        setTimeout(() => {
            carrinho.classList.remove('vibrate');
        }, 500);

        contador++;
        contadorItensCarrinho.textContent = contador;
    } else {
        alert('Selecione um tamanho antes de comprar!');
    }
});
