<?php
include 'conexao.php';

// Verifique se o código do tênis foi passado por URL
$codigoTenis = isset($_GET['codigo']) ? intval($_GET['codigo']) : 1;

// Consulta SQL para buscar informações do tênis
$queryTenis = "SELECT t.codigo, t.nome, t.valor, t.descricao, i.urlImg 
               FROM tenis t 
               LEFT JOIN imagens i ON t.codigo = i.codigoTenis 
               WHERE t.codigo = $codigoTenis";
$resultTenis = $mysqli->query($queryTenis);

if ($resultTenis && $resultTenis->num_rows > 0) {
    $tenis = $resultTenis->fetch_assoc();
} else {
    echo "Tênis não encontrado.";
    exit;
}

// Consulta SQL para buscar tamanhos disponíveis
$queryTamanhos = "SELECT tamanho FROM tamanhos WHERE codigoTenis = $codigoTenis";
$resultTamanhos = $mysqli->query($queryTamanhos);
$tamanhos = [];

if ($resultTamanhos && $resultTamanhos->num_rows > 0) {
    while ($row = $resultTamanhos->fetch_assoc()) {
        $tamanhos[] = $row['tamanho'];
    }
}

$urlVoltarCompra = "paginacarrinho.php";
$urlVoltarAdicionarCarrinho = "paginatenisespecifico.php?codigo=" . $codigoTenis;

if(isset($_GET['erro'])){
    echo "<script>alert('Selecione um tamanho antes de comprar!')</script>";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icones/icon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./estilos/paginatenisespecifico.css">
    <link rel="stylesheet" href="./estilos/header.css">
    <link rel="stylesheet" href="./estilos/footer.css">
    <script src="./scripts/paginatenisespecifico.js" defer></script>
    <script src="./scripts/geral.js"></script>
    <title>SoladoCerto - <?php echo htmlspecialchars($tenis['nome']); ?></title>
</head>
<body>
    <header id="header-principal"></header>
    <nav id="nav-principal"></nav>
    <main>
        <section class="tenis">
            <header>
                <h2><?php echo htmlspecialchars($tenis['nome']); ?></h2>
            </header>
            <article class="container-principal">
                <div class="fototenis">
                    <?php
                    $resultTenis->data_seek(0); // Reseta o ponteiro para exibir todas as imagens
                    while ($img = $resultTenis->fetch_assoc()) {
                        echo '<img src="' . htmlspecialchars($img['urlImg']) . '" alt="Imagem do ' . htmlspecialchars($tenis['nome']) . '">';
                    }
                    ?>
                </div>
                <div class="desc">
                    <h2><?php echo htmlspecialchars($tenis['nome']); ?></h2>
                    <h3>Código: <?php echo $tenis['codigo']; ?></h3>
                    <h3>Valor: R$<?php echo number_format($tenis['valor'], 2, ',', '.'); ?></h3>
                    <h3>Tamanho:</h3>
                    <div class="tamanhos">
                        <?php
                        foreach ($tamanhos as $tamanho) {
                            ?>
                            <a href="?codigo=<?php echo $tenis['codigo'] ?>&tamanho=<?php echo $tamanho ?>">
                                <p <?php if(isset($_GET['tamanho']) && (string) $_GET['tamanho'] === $tamanho){ echo "class=\"selecionado\"";} ?>><?php echo $tamanho ?></p>
                            </a>
                            
                            <?php
                        }
                        ?>
                    </div>
                    <div class="container-botoes">
                        <a class="botao-compra" href="
                                    adicionarItem.php?id=<?php echo $codigoTenis ?>
                                    &urlVoltar=<?php echo $urlVoltarCompra ?>
                                    <?php if(isset($_GET['tamanho'])){ echo "&tamanho=" . $_GET['tamanho'] . "";}?>">
                            <p>Comprar</p>
                        </a>
                        <a class="botao-compra" href="
                                    adicionarItem.php?id=<?php echo $codigoTenis ?>
                                    &urlVoltar=<?php echo $urlVoltarAdicionarCarrinho ?>
                                    <?php if(isset($_GET['tamanho'])){ echo "&tamanho=" . $_GET['tamanho'] . "";}?>">
                            <p>Adicionar ao carrinho</p>
                        </a>
                    </div>
                    
                </div>
            </article>
        </section>

        <section class="infos">
            <header>
                <h3>Sobre:</h3>
            </header>
            <article>
                <p><?php echo htmlspecialchars($tenis['descricao']); ?></p>
            </article>
        </section>

        <section class="avaliacoes">
                <header>
                    <h3>Avaliações</h3>
                </header>
                <article class="avaliacoes-lista">
                    <div class="avaliacao">
                        <p><strong>João:</strong> Excelente qualidade e muito confortável! ⭐⭐⭐⭐⭐</p>
                    </div>
                    <div class="avaliacao">
                        <p><strong>Ana:</strong> Muito estiloso, mas o preço é um pouco alto. ⭐⭐⭐⭐</p>
                    </div>
                    <div class="avaliacao">
                        <p><strong>Carlos:</strong> Adorei o design, vale cada centavo! ⭐⭐⭐⭐⭐</p>
                    </div>
                </article>
            </section>
    </main>
    <footer id="footer-principal"></footer>
</body>
</html>





