<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}


class VizualizarEstoqueProduto {

    private $Dados;
    private $PageId;

    public function index() {
        $this->PageId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        //echo ($this->PageId);

        $vizualizar_produto = new \Sts\Models\StsVizualizarEstoqueProduto();

        $this->Dados['ver_produto'] = $vizualizar_produto->VerEstoqueProduto($this->PageId);

        $carregarView = new \Core\ConfigView('sts/Views/estoque/operacoes/vizualizar',$this->Dados);
        $carregarView->renderizar();
    }
}