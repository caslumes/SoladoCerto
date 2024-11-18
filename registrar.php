<?php
    include "conexao.php";

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha = md5($senha);

        $verificarEmail = "SELECT * FROM usuarios WHERE email = '$email'";
        $rs = $mysqli->query($verificarEmail);

        if($rs->num_rows > 0){
            echo "Endereço de E-mail já cadastrado!";
        }else{
            $inserir = "INSERT INTO usuarios(nome, sobrenome, email, senha)
                        VALUES('$nome', '$sobrenome', '$email', '$senha'";
            if($mysqli->query($inserir) == TRUE){
                header("location: login.php");
            }else{
                echo "Erro: ".$mysqli->error;
            }
        }
    }

    if(isset($_POST['entrar'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha = md5($senha);

        $verificarLogin = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
        $rs = $mysqli->query($verificarLogin);

        if($rs->num_rows > 0){
            session_start();
            $linha = $rs->fetch_assoc();
            $_SESSION['email'] = $row['email'];
            header("location: pagina-principal.php");
            exit();
        }else{
            echo "E-mail ou senha incorretos!";
        }
    }
?>