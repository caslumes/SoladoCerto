<?php
    include "conexao.php";

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha = $senha = password_hash($senha, PASSWORD_DEFAULT);

        $verificarEmail = "SELECT * FROM usuarios WHERE email = '$email'";
        $rs = $mysqli->query($verificarEmail);

        if($rs->num_rows > 0){
            header("location: paginalogin.php?erro=3");
        }else{
            $inserir = "INSERT INTO usuarios(nome, sobrenome, email, senha)
                        VALUES('$nome', '$sobrenome', '$email', '$senha')";
            if($mysqli->query($inserir) == TRUE){
                header("location: paginalogin.php");
            }else{
                echo "Erro: ".$mysqli->error;
            }
        }
    }

    if(isset($_POST['entrar'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $verificarLogin = "SELECT * FROM usuarios WHERE email='$email'";
        $rs = $mysqli->query($verificarLogin);

        if($rs->num_rows > 0){
            $linha = $rs->fetch_assoc();
            if(password_verify($senha, $linha['senha'])){
                session_start();
                $_SESSION['email'] = $linha['email'];
                header("location: paginaprincipal.php");
                exit();
            }else{
                header("location: paginalogin.php?erro=1");
            }
        }else{
            header("location: paginalogin.php?erro=2");
        }
    }
?>