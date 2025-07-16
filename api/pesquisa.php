<?php
    include 'conexao.php';

    if(isset($_GET['busca'])){
        $busca = strip_tags($_GET['busca']);
        $tituloPagina = "Pesquisa > \"" . $busca . "\"";
        $queryTenis = "SELECT * FROM tenis WHERE nome LIKE '%$busca%'";
    }else{
        $tituloPagina = "Catálogo";
        $queryTenis = "SELECT * FROM tenis";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Solado Certo - Catálogo</title>

    <link rel="shortcut icon" href="icones/icon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="scripts/pesquisa.js"></script>
    <link rel="stylesheet" href="./estilos/header.css">
    <link rel="stylesheet" href="./estilos/footer.css">
    <link rel="stylesheet" href="./estilos/pesquisa.css">
    <script src="./scripts/geral.js"></script>
</head>
<body>
    <header id="header-principal">       
    </header>

    <nav id="nav-principal">
    </nav>
    
    <main class="main-pesquisa-tenis">
        <header class="header-pesquisa-tenis">
            <section class="secao-esquerda-header-pesquisa">
                <h1><?php echo $tituloPagina ?></h1>
            </section>
        </header>

        <section class="secao-pesquisa">
            <aside class="barra-filtros">
                <div class="filtro">
                    <p>Marca</p>
                    <ul class="submenu-filtro">
                        <li>
                            <input class="pesquisa-opcao" type="text" placeholder="Faça sua busca">
                        </li>
                        <li>
                            <div class="lista-opcoes">
                                <div class="opcao-lista">
                                    <form action="" method="get">
                                        <input name="opcao1" value="Nike" class="checkbox-opcao" type="checkbox">
                                    </form>
                                    <p>Nike</p>
                                </div>
                                <div class="opcao-lista">
                                    <form action="">
                                        <input name="opcao2" value="Adidas" class="checkbox-opcao" type="checkbox">
                                    </form>
                                    <p>Adidas</p>
                                </div>
                                <div class="opcao-lista">
                                    <form action="">
                                        <input name="opcao3" value="New Balance" class="checkbox-opcao" type="checkbox">
                                    </form>
                                    <p>New Balance</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <button type="submit">Aplicar Filtros</button>
            </aside>
    
            <section class="secao-tenis">
                <div class="ordenar">
                    <div class="ordenar-por">
                        <p>Ordenar por: </p>
                        <select class="selecao-ordenar" name="ordernar" id="">
                            <option value="Relevância">Relevância</option>
                            <option value="Maior preço">Maior preço</option>
                            <option value="Menor preço">Menor preço</option>
                            <option value="Maior desconto">Maior desconto</option>
                        </select>
                    </div>
                </div>
                                
                <section class="grid-tenis">
                <?php
                    $rsTenis = $mysqli->query($queryTenis);

                    if($rsTenis->num_rows > 0){
                        while($tenis = $rsTenis->fetch_assoc()){
                            $codigoTenis = $tenis['codigo'];
                            $valorTenis = $tenis['valor'];
                            $queryImg = "SELECT * FROM imagens WHERE codigoTenis = $codigoTenis";

                            $rsImg = $mysqli->query($queryImg);
                            $imagem = $rsImg->fetch_assoc();
                            ?>
                            <div class="item-grid">
                                <a class="container-tenis" href="paginatenisespecifico.php?codigo=<?php echo $codigoTenis ?>">
                                    <img class="imagem-preview-tenis" src="<?php echo $imagem['urlImg'] ?>" alt="">
                                    <div class="infos-tenis">
                                        <p class="nome-tenis"><?php echo $tenis['nome'] ?></p>
                                        <p>A partir de:</p>
                                        <p class="preco">R$<?php echo number_format($valorTenis, 2, ",", ".") ?></p>
                                        <p>ou 12x de R$<?php echo number_format($valorTenis/12, 2, ",", ".") ?></p>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    }else{
                        ?>
                        <p>Nenhum item corresponde a sua pesquisa.</p>
                        <?php
                    }
                ?>
                    
                </section>
            </section>
        </section>
    </main>

    <footer id="footer-principal">
    </footer>
</body>
</html>