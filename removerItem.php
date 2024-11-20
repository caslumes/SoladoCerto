<?php
    require("Carrinho.php");
    require("Item.php");
    require("Produto.php");

    session_start();

    $carrinho = $_SESSION['carrinho'];

    $id = (int) strip_tags($_GET['id']);
    $produto = new Produto($id);
    $carrinho->remover($produto);

    header("location: " . $_GET['urlVoltar']);
?>