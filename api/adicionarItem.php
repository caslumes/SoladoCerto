<?php
    require("Carrinho.php");
    require("Item.php");
    require("Produto.php");

    session_start();

    $carrinho = $_SESSION['carrinho'];

    $id = (int) strip_tags($_GET['id']);

    if(isset($_GET['tamanho'])){
        $tamanho = (int) $_GET['tamanho'];
        $produto = new Produto($id, $tamanho);
        $carrinho->adicionar($produto);
        header("location: " . $_GET['urlVoltar']);
    }else{
        header("location: paginatenisespecifico.php?codigo=" . $id . "&erro=1");
    }
?>