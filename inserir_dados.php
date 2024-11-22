<?php
    $codigo = 0;
    $nome = "";
    $valor = 0;
    $descricao = "";
    $tamanhos = [];
    $urls = [];
    $stringQueryTamanhos = "";
    $stringQueryImagens = "";

    if(isset($_GET['codigo'])){
        $codigo = $_GET['codigo'];
        $nome = $_GET['nome'];
        $valor = $_GET['valor'];
        $descricao = $_GET['descricao'];
        $tamanhos = $_GET['tamanhos'];
        $urls = $_GET['url-imagem'];
        foreach($tamanhos as $index => $tamanho){
            $stringQueryTamanhos = $stringQueryTamanhos . "(" . $codigo . "," . $tamanho  . "," . 2 . ")";
            if($index === count($tamanhos) - 1){
                $stringQueryTamanhos = $stringQueryTamanhos . ";";
            }else{
                $stringQueryTamanhos = $stringQueryTamanhos . ",";
            }
        }
        foreach($urls as $index => $url){
            $stringQueryImagens = $stringQueryImagens . "(" . $codigo . ", './imagens/imgstenis/" . $url  . "')";
            if($index === count($urls) - 1){
                $stringQueryImagens = $stringQueryImagens . ";";
            }else{
                $stringQueryImagens = $stringQueryImagens . ",";
            }
        }
    }else{
        include("criar_db.php");
    }

    include("conexao.php");

    $inserirDados = "
        INSERT INTO tenis (codigo, nome, valor, descricao) VALUES
        (" . $codigo . ", '" . $nome . "', " . $valor . ", '" . $descricao . "');";

    if($conn->multi_query($inserirDados) == TRUE){
        echo "Dados inseridos com sucesso!";
    }else{
        echo "Erro ao inserir dados: " . $conn->error;
    }

    $inserirDados= "
        INSERT INTO tamanhos (codigoTenis, tamanho, qtdEstoque) VALUES
        " . $stringQueryTamanhos;
    
    if($conn->multi_query($inserirDados) == TRUE){
        echo "Dados inseridos com sucesso!";
    }else{
        echo "Erro ao inserir dados: " . $conn->error;
    }

    $inserirDados = "
        INSERT INTO imagens (codigoTenis, urlImg) VALUES
        " . $stringQueryImagens . "
    ";

    if($mysqli->multi_query($inserirDados) == TRUE){
        echo "Dados inseridos com sucesso!";
    }else{
        echo "Erro ao inserir dados: " . $mysqli->error;
    }

    $mysqli->close();
?>