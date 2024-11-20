<?php

    if(isset($_GET['codigo'])){
        echo $_GET['codigo'];
    }
    if(isset($_GET['nome'])){
        echo $_GET['nome'];
    }
    if(isset($_GET['valor'])){
        echo $_GET['valor'];
    }
    if(isset($_GET['descricao'])){
        echo $_GET['descricao'];
    }
    if(isset($_GET['url-imagem'])){
        echo $_GET['url-imagem'][0];
        echo $_GET['url-imagem'][1];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input name="codigo" type="text" placeholder="Código do Tênis" required>
        <input name="nome" type="text" placeholder="Nome do Tênis" required>
        <input name="valor" type="number" placeholder="Valor do Tênis" required>
        <input name="descricao" type="text" placeholder="Descrição do Tênis" required>
        <input name="url-imagem[]" type="text" placeholder="URL da imagem 1" required>
        <input name="url-imagem[]" type="text" placeholder="URL da imagem 2" required>

        <input type="submit" value="Inserir">
    </form>
</body>
</html>