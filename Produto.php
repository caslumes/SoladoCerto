<?php

    class Produto{
        private int $id;
        private string $nome;
        private float $valor;
        private string $desc;
        private string $urlImg;

        public function __construct(int $id)
        {
            $this->id = $id;

            include("conexao.php");
            $queryTenis = "SELECT * FROM tenis WHERE codigo=$id";
            $rsTenis = $mysqli->query($queryTenis);

            $tenis = $rsTenis->fetch_assoc();

            $this->nome = $tenis['nome'];
            $this->valor = $tenis['valor'];
            $this->desc = $tenis['descricao'];

            $queryImg = "SELECT urlImg FROM imagens WHERE codigoTenis = $id";
            $rsImg = $mysqli->query($queryImg);

            $img = $rsImg->fetch_assoc();
            $this->urlImg = $img['urlImg'];
        }

        public function getId(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getValor(){
            return $this->valor;
        }

        public function getDesc(){
            return $this->desc;
        }

        public function getUrlImg(){
            return $this->urlImg;
        }
    }

?>