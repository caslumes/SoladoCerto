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
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icones/icon.ico" type="image/x-icon">
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
                    <p><?php echo htmlspecialchars($tenis['nome']); ?></p>
                    <p>Código: <?php echo $tenis['codigo']; ?></p>
                    <p>Valor: R$<?php echo number_format($tenis['valor'], 2, ',', '.'); ?></p>
                    <p>Tamanho:</p>
                    <div class="tamanhos">
                        <?php
                        foreach ($tamanhos as $tamanho) {
                            echo "<p>$tamanho</p>";
                        }
                        ?>
                    </div>
                    <div class="botao-compra">
                        <p>Comprar</p>
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





