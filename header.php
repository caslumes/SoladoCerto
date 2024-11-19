<?php
    include("conexao.php");
    session_start();
?>

<section class="secao-esquerda-header-principal">
    <a class="container-logo" href="paginaprincipal.php">
        <img class="logo" src="./imagens/header/logo.png" alt="" />
    </a>
</section>

<section class="secao-meio-header-principal">
    <input class="pesquisa-header" type="text" placeholder="Pesquise algum tênis"/>
</section>

<section class="secao-direita-header-principal">
    <section class="conta">
        <?php
            if(isset($_SESSION['email'])){
                $email = $_SESSION['email'];
                $selectNome = "SELECT nome FROM usuarios WHERE email = '$email'";
                $rs = $mysqli->query($selectNome);
                $linha = $rs->fetch_assoc();
                $nome = $linha['nome'];
                ?>
                <p class="usuario">Olá, <?php echo $nome ?>!</p>
                <form action="logout.php" method="post">
                    <input type="submit" class="logout" value="Sair da conta">
                </form>
                <?php
            }else{
                ?>
                <a class="login" href="login.php">Entre ou cadastre-se</a>
                <?php
            }
        ?>
    </section>
    <a href="">
        <img class="imagem-carrinho" src="./imagens/header/carrinho.png" alt=""/>
        <span class="contador-itens-carrinho">0</span>
        <!-- Contador de itens -->
    </a>
</section>