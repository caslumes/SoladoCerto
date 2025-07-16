<?php
    require("Carrinho.php");
    require("Item.php");
    require("Produto.php");

    session_start();

    if(!isset($_SESSION['carrinho'])){
        $carrinho = new Carrinho;
        $_SESSION['carrinho'] = $carrinho;
    }else{
        $carrinho = $_SESSION['carrinho'];
    }

    $urlVoltar = "paginacarrinho.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icones/icon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./estilos/carrinho.css">
    <link rel="stylesheet" href="./estilos/header.css">
    <title>Solado Certo - Carrinho</title>
</head>
<body>
    <header id="header-principal">
        <section class="secao-esquerda-header-principal">
            <a class="container-logo" href="paginaprincipal.php">
                <img class="logo" src="./imagens/header/logo.png" alt="" />
            </a>
        </section>
    </header>

    <main>
    <?php
        if(isset($_SESSION['carrinho']) && count($carrinho->getItens()) > 0){
            ?>
            <div class="container-produtos">
                <ul>
                    <?php foreach($carrinho->getItens() as $itemCarrinho){
                        ?>
                    <li class="item-compra">
                        <a class="container-imagem-produto" href="paginatenisespecifico.php?codigo= <?php echo $itemCarrinho->getIdProduto() ?>">
                            <img class=imagem-produto src="<?php echo $itemCarrinho->getUrlImgProduto()?>" alt="">
                        </a>
                        <div class="container-desc-item">
                            <div class="container-info-produto">
                                <h3><?php echo $itemCarrinho->getNomeProduto()?></h3>
                                <p>Tamanho: <?php echo $itemCarrinho->getTamanhoProduto()?></p>
                            </div>
                            <div class="container-qtd-produto">
                                <a href="removerItem.php?id=<?php echo $itemCarrinho->getIdProduto()?>&tamanho=<?php echo $itemCarrinho->getTamanhoProduto()?>
                                &urlVoltar=<?php echo $urlVoltar ?>"><img class="icone" src="./icones/remover.png" alt=""></a>
                                <h3><?php echo $itemCarrinho->getQnt() ?></h3>
                                <a href="adicionarItem.php?id=<?php echo $itemCarrinho->getIdProduto()?>&tamanho=<?php echo $itemCarrinho->getTamanhoProduto()?>
                                &urlVoltar=<?php echo $urlVoltar ?>"><img class="icone" src="./icones/adicionar.png" alt=""></a>
                            </div>
                            <h4>R$<?php echo number_format($itemCarrinho->getQnt() * $itemCarrinho->getValorProduto(), 2, ",", ".") ?></h4>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            
            <div class="container-informacoes">
                <div class="container-calculo">
                    <ul>
                        <li class="item-calculo">
                            <p>Produtos</p>
                            <p>R$<?php echo number_format($carrinho->getValorTotal(), 2, ",", ".") ?></p>
                        </li>
                    </ul>
                    <div class="total">
                        <h3>Total</h3>
                        <div class="valor">
                            <h2>R$<?php echo number_format($carrinho->getValorTotal(), 2, ",", ".") ?> à vista</h2>
                            <p>ou em até <strong>12x de R$<?php echo number_format($carrinho->getValorTotal()/12, 2, ",", ".") ?></strong></p>
                        </div>
                    </div>
                    <a href=""><p>Continuar</p></a>
                </div>
            </div>
        <?php
        }else{
            ?>
            <div class="carrinho-vazio">
                <h2>Seu carrinho está vazio.</h2>
                <a href="./paginaprincipal.php"><p>Voltar a Pagina Principal</p></a>
            </div>
            <?php
        }
    ?>   
    </main>

    <footer id=footer-principal>
    </footer>
</body>
</html>