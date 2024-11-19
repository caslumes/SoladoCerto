<?php
  include("conexao.php")
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="./estilos/paginaprincipal.css" />
    <link rel="shortcut icon" href="icones/icon.ico" type="image/x-icon">

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="./estilos/header.css" />
    <link rel="stylesheet" href="./estilos/footer.css" />
    <script src="./scripts/paginaprincipal.js" defer></script>
    <script src="./scripts/geral.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Solado Certo</title>
  </head>

  <body>
    <header id="header-principal">
    </header>

    <nav id="nav-principal">
    </nav>

    <main>
      <!-- Mosaico Inicial -->
      <section class="hudInicial">
        <div class="mosaicoHUD">
          <img
            src="./imagens/pagina_principal/LebronHUD.jpg"
            class="imgHUD"
            id="imgHUD_LEFT"
          />
          <div class="container-imagem-meio">
            <img
              src="./imagens/pagina_principal/Lebron15HUD.jpg"
              class="imgHUD"
              id="imgHUD_MID"
            />
            <div class="textoHUD">
              <h2 id="textHUD"></h2>
            </div>
          </div>
          <img
            src="./imagens/pagina_principal/Lebron2HUD.webp"
            class="imgHUD"
            id="imgHUD_RIGHT"
          />
        </div>
      </section>
      <!-- Imagen Sessão 2 -->
      <section>
        <div>
          <img
            src="./imagens/pagina_principal/tenisCorridaPaisagem.webp"
            class="img2HUD"
            id="mosaicoHUDMAIN"
            alt="img2HUD"
          />
          <div class="paisagemTexto">
            <h2>
              <a href="./pesquisa.php"> TODOS OS TÊNIS -></a>
            </h2>
          </div>
        </div>
      </section>
      <!-- Mosaico Tênis -->
      
      <section class="produtoPagInicial">
      <?php
        $queryTenis = "SELECT * FROM tenis";
        $rsTenis = $mysqli->query($queryTenis);

        while($tenis = $rsTenis->fetch_assoc()){
          $codigoTenis = $tenis['codigo'];
          $valorTenis = $tenis['valor'];
          $queryImg = "SELECT * FROM imagens WHERE codigoTenis = $codigoTenis";

          $rsImg = $mysqli->query($queryImg);
          $imagem = $rsImg->fetch_assoc();
          ?>

          <div>
            <a href="paginatenisespecifico.php?codigo=<?php echo $codigoTenis ?>"
              ><img
                src="<?php echo $imagem['urlImg'] ?>"
                class="imagemTenis"
            /></a>
            <p class="tituloProduto"><?php echo $tenis['nome'] ?></p>
            <p class="tituloProduto">R$<?php echo number_format($valorTenis, 2, ",", ".") ?></p>
          </div>
          <?php
      }
      ?>
      </section>
    </main>

    <!-- Footer -->
    <footer id="footer-principal">
    </footer>
  </body>
</html>
