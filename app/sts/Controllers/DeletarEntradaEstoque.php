<?php

namespace sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class DeletarEntradaEstoque
{
    private $PageId;


public function index()
    {
        $this->deletarEntradaEstoque();

    }
    public function deletarEntradaEstoque()
    {
        $this->PageId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($this->PageId)) {
            $Deletar_Produto = new \Sts\Models\StsDeletarEntradaEstoque();

            //var_dump($this->PageId);
            $Deletar_Produto->DeletarEntradaEstoque($this->PageId);
        } else {
            echo "<div class='alert alert-danger'>Erro: Necessário selecionar um produto!</div>";
        }
        $UrlDestino = URL . 'RelatorioEntradaEstoque';
        header("Location: $UrlDestino");
    }
}
