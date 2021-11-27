<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}


class VizualizarSaidaEstoqueProduto {

    private $Dados;
    private $PageId;

    public function index() {
        $this->PageId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        //echo ($this->PageId);

        $vizualizar_produto = new \Sts\Models\StsVizualizarSaidaEstoqueProduto();

        $this->Dados['ver_estoque'] = $vizualizar_produto->VerSaidaEstoqueProduto($this->PageId);
        $carregarView = new \Core\ConfigView('sts/Views/relatorio/estoque/vizualizarSaida',$this->Dados);
        $carregarView->renderizar();
    }
}