<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contato SoladoCerto</title>
    <link rel="stylesheet" href="./estilos/paginadecontato.css" />
    <link rel="shortcut icon" href="icones/icon.ico" type="image/x-icon">

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="./estilos/header.css" />
    <link rel="stylesheet" href="./estilos/footer.css" />
    <link rel="stylesheet" href="./estilos/estilopesquisa.css" />
    <link rel="stylesheet" href="./estilos/modal.css" /> 
    <script src="./scripts/geral.js" defer></script>
    <script src="./scripts/paginadecontato.js" defer></script>
  </head>
  <body>
    <header id="header-principal">
    </header>

    <nav id="nav-principal">
    </nav>

    <div class="main-content">
      <div class="contact-section">
        <h1>Fale com a nossa equipe</h1>
        <form id="contactForm">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" required />

          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" required />

          <label for="mensagem">Mensagem:</label>
          <textarea id="mensagem" name="mensagem" rows="4" required></textarea>

          <button type="submit">Enviar</button>
        </form>

        <div class="contact-info">
          <h2>Nossos contatos</h2>
          <p>Telefone: (11) 1234-5678</p>
          <p>E-mail: contato@SoladoCerto.com.br</p>
          <p>Endereço: Rua Ricardo Breno de Lucas Matheus, 789, Limeira, SP</p>
        </div>
      </div>
    </div>

    <footer id="footer-principal">
    </footer>


    <div id="modal" class="modal">
      <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Confirmação de Envio</h2>
        <p id="modal-text"></p>
        <button id="confirm-button">Enviar</button>
      </div>
    </div>
  </body>
</html>
