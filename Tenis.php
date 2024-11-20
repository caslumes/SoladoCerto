<?php

    class Tenis extends Produto{
        private int $tamanho;

        public function setTamanho(int $tamanho){
            $this->tamanho = $tamanho;
        }

        public function getTamanho(){
            return $this->tamanho;
        }
    }

?>