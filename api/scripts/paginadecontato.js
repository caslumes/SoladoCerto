class FormularioContato {
    constructor(form) {
      this.form = form;
      this.nome = form.querySelector('#nome');
      this.email = form.querySelector('#email');
      this.mensagem = form.querySelector('#mensagem');
      this.modal = document.getElementById('modal');
      this.modalText = document.getElementById('modal-text');
      this.closeButton = document.querySelector('.close-button');
      this.confirmButton = document.getElementById('confirm-button');
      this.init();
    }
  
    init() {
      this.form.addEventListener('submit', (e) => this.enviarFormulario(e));
      this.closeButton.addEventListener('click', () => this.fecharModal());
      this.confirmButton.addEventListener('click', () => this.confirmarEnvio());
    }
  
    validar() {
      if (this.nome.value.length < 3) {
        alert("O nome deve ter pelo menos 3 caracteres.");
        return false;
      }
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(this.email.value)) {
        alert("Por favor, insira um e-mail válido.");
        return false;
      }
      return true;
    }
  
    enviarFormulario(e) {
      e.preventDefault();
      if (this.validar()) {
        this.modalText.innerText = `Nome: ${this.nome.value}\nE-mail: ${this.email.value}\nMensagem: ${this.mensagem.value}`;
        this.modal.style.display = "block"; 
      }
    }
  
    fecharModal() {
      this.modal.style.display = "none"; 
    }
  
    confirmarEnvio() {
      alert('Mensagem enviada com sucesso!');
      this.fecharModal();
      this.form.reset(); 
    }
  }
  

  document.addEventListener('DOMContentLoaded', () => {
    const formulario = new FormularioContato(document.getElementById('contactForm'));
  });
  
