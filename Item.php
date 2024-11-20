<?php

    class Item{
        private Produto $produto;
        private int $qnt;
    
        public function __construct($produto)
        {
            $this->produto = $produto;
            $this->qnt = 1;
        }

        public function getIdProduto(){
            return $this->produto->getId();
        }

        public function getNomeProduto(){
            return $this->produto->getNome();
        }

        public function getValorProduto(){
            return $this->produto->getValor();
        }

        public function getUrlImgProduto(){
            return $this->produto->getUrlImg();
        }

        public function setQnt(int $qnt){
            $this->qnt = $qnt;
        }

        public function getQnt(){
            return $this->qnt;
        }

    }
?>