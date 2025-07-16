<?php
 $hostname = "sql10.freesqldatabase.com";
 $bancodedados = "sql10790258";
 $usuario = "sql10790258";
 $senha = "qVv5PYybry";

 $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

    if($mysqli->connect_errno){

        echo "Falha ao conectar:(" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
    }
?>