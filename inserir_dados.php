<?php
    include("criar_db.php");
    include("conexao.php");

    $inserirDados = "
        INSERT INTO tenis (codigo, nome, valor, descricao) VALUES
        (1, 'Nike Air Jordan 1 Retro High OG Taxi', 1499.99, 'Tênis Air Jordan 1 Retro High OG, estilo e história com conforto moderno para o dia a dia.'),
        (2, 'Nike Air Force 1 Branco', 799.99, 'Nike Air Force 1, clássico do streetwear com durabilidade e visual clean.'),
        (3, 'Adidas Campus 00s Cinza', 699.99, 'Adidas Campus 00s, estilo atemporal e conforto para qualquer ocasião.'),
        (4, 'Nike Dunk Low Retro', 899.99, 'Nike Dunk Low Retro, visual clean e durabilidade com sola de borracha.'),
        (5, 'New Balance 9060', 1199.99, 'New Balance 9060, design futurista e conforto com entressola ABZORB.');

        INSERT INTO tamanhos (codigoTenis, tamanho, qtdEstoque) VALUES
        (1, 39, 2), (1, 40, 2), (1, 41, 2), (1, 42, 2), (1, 43, 2),
        (2, 39, 2), (2, 40, 2), (2, 41, 2), (2, 42, 2), (2, 43, 2),
        (3, 39, 2), (3, 40, 2), (3, 41, 2), (3, 42, 2), (3, 43, 2),
        (4, 39, 2), (4, 40, 2), (4, 41, 2), (4, 42, 2), (4, 43, 2),
        (5, 39, 2), (5, 40, 2), (5, 41, 2), (5, 42, 2), (5, 43, 2);

        INSERT INTO imagens (codigoTenis, urlImg) VALUES
        (1, './imagens/imgstenis/imagemJordan1.png'),
        (1, './imagens/imgstenis/imagemJordan2.png'),
        (2, './imagens/imgstenis/imagemForce1.png'),
        (2, './imagens/imgstenis/imagemForce2.png'),
        (3, './imagens/imgstenis/imagemCampus1.png'),
        (3, './imagens/imgstenis/imagemCampus2.png'),
        (4, './imagens/imgstenis/imagemDunk1.png'),
        (4, './imagens/imgstenis/imagemDunk2.png'),
        (5, './imagens/imgstenis/imagemNewBalance1.png'),
        (5, './imagens/imgstenis/imagemNewBalance2.png');
    ";

    if($conn->multi_query($inserirDados) == TRUE){
        echo "Dados inseridos com sucesso!";
    }else{
        echo "Erro ao inserir dados: " . $conn->error;
    }

    $conn->close();
?>