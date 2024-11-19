<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "SoladoCerto";

    $conn = new mysqli($host, $user, $password);

    if($conn->connect_error){
        die("Conexão falhou: " . $conn->connect_error);
    }

    $createDB = "CREATE DATABASE IF NOT EXISTS $dbname";

    if($conn->query($createDB) == TRUE){
        echo "Database '$dbname' criada com sucesso!";
    }else{
        echo "Erro ao criar database: " . $conn->error;
    }

    $conn->close();

    $conn = new mysqli($host, $user, $password, $dbname);

    if($conn->connect_error){
        echo "Erro ao conectar-se: " . $conn->connect_error;
    }

    $createTables = "
        CREATE TABLE IF NOT EXISTS usuarios(
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            sobrenome VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            senha VARCHAR(255) NOT NULL
        );

        CREATE TABLE IF NOT EXISTS tenis(
            codigo INT NOT NULL,
            nome VARCHAR(100) NOT NULL,
            valor DECIMAL (10,2) NOT NULL,
            descricao VARCHAR (255) NOT NULL,
            PRIMARY KEY (codigo)
        );

        CREATE TABLE IF NOT EXISTS imagens(
            codigoTenis INT NOT NULL,
            urlImg VARCHAR (200) NOT NULL,
            PRIMARY KEY (codigoTenis,urlImg),
            FOREIGN KEY (codigotenis) REFERENCES tenis(codigo)
        );

        CREATE TABLE IF NOT EXISTS tamanhos(
            codigoTenis INT NOT NULL,
            tamanho INT NOT NULL,
            qtdEstoque INT NOT NULL,
            PRIMARY KEY (codigoTenis,tamanho),
            FOREIGN KEY (codigotenis) REFERENCES tenis(codigo)
        );
    ";

    if($conn->multi_query($createTables) == TRUE){
        echo "Tabelas criadas com sucesso!";
    }else{
        echo "Erro ao criar tabelas: " . $conn->error;
    }

    $conn->close();
?>