<?php

    class Carrinho{
        private array $itens = [];

        public function adicionar(Produto $produto){
            foreach($this->itens as $itemCarrinho){
                if($itemCarrinho->getIdProduto() === $produto->getId()){
                    $itemCarrinho->setQnt($itemCarrinho->getQnt() + 1);
                    return;
                }
            }

            $this->itens[] = new Item($produto);
        }

        public function remover(Produto $produto){
            foreach($this->itens as $index => $itemCarrinho){
                if($itemCarrinho->getIdProduto() === $produto->getId()){
                    $itemCarrinho->setQnt($itemCarrinho->getQnt() - 1);
                    if($itemCarrinho->getQnt() === 0){
                        unset($this->itens[$index]);
                    }
                    break;
                }
            }
        }

        public function getCarrinho(){
            return $_SESSION['carrinho'] ?? [];
        }

        public function getItens(){
            return $this->itens;
        }

        public function getQntItem(int $id){
            foreach($this->itens as $itemCarrinho){
                if($itemCarrinho->getIdProduto() === $id){
                    return $itemCarrinho->getQnt();                   
                }
            }
        }

        public function getQntTotal(){
            $qnt = 0;
            foreach($this->itens as $itemCarrinho){
                $qnt += $itemCarrinho->getQnt();
            }
            return $qnt;
        }

        public function getValorTotal(){
            $valor = 0;
            foreach($this->itens as $itemCarrinho){
                $valor += $itemCarrinho->getQnt() * $itemCarrinho->getValorProduto();
            }
            return $valor;
        }
    }

?>