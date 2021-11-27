<?php

namespace sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class DeletarProduto
{
    private $PageId;


public function index()
    {
        $this->deletarProduto();

    }
    public function deletarProduto()
    {
        $this->PageId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($this->PageId)) {
            $Deletar_Produto = new \Sts\Models\StsDeletarProduto();

            //var_dump($this->PageId);
            $Deletar_Produto->DeletarProduto($this->PageId);
        } else {
            echo "<div class='alert alert-danger'>Erro: Necessário selecionar um produto!</div>";
        }
        $UrlDestino = URL . 'Produtos';
        header("Location: $UrlDestino");
    }
}
