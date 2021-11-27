<?php

namespace sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class DeletarSaidaEstoque
{
    private $PageId;


public function index()
    {
        $this->deletarSaidaEstoque();

    }
    public function deletarSaidaEstoque()
    {
        $this->PageId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($this->PageId)) {
            $Deletar_Produto = new \Sts\Models\StsDeletarSaidaEstoque();

            //var_dump($this->PageId);
            $Deletar_Produto->DeletarSaidaEstoque($this->PageId);
        } else {
            echo "<div class='alert alert-danger'>Erro: Necessário selecionar um produto!</div>";
        }
        $UrlDestino = URL . 'RelatorioSaidaEstoque';
        header("Location: $UrlDestino");
    }
}
