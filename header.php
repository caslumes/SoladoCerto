<section class="secao-esquerda-header-principal">
    <a class="container-logo" href="pagina-principal.html">
    <img class="logo" src="./imagens/header/logo.png" alt="" />
    <span class="contador-itens-carrinho">0</span>
    <!-- Contador de itens -->
    </a>
</section>

<section class="secao-meio-header-principal">
    <input class="pesquisa-header" type="text" placeholder="Pesquise algum tênis"/>
</section>

<section class="secao-direita-header-principal">
    <?php
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $usuario = "SELECT nome FROM usuarios WHERE email = '$email'";
            $nome = $usuario['nome'];
            ?>
            <p class="usuario">Olá, <?php echo $nome ?>!</p>
            <?php
        }else{
            ?>
            <a class="login" href="login.php">Entre ou cadastre-se</a>
            <?php
        }
    ?>
    <a href="">
    <img class="imagem-carrinho" src="./imagens/header/carrinho.png" alt=""/>
    </a>
</section>