<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}


class VizualizarProduto {

    private $Dados;
    private $PageId;

    public function index() {
        $this->PageId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        //echo ($this->PageId);

        $vizualizar_produto = new \Sts\Models\StsVizualizarProduto();

        $this->Dados['ver_produto'] = $vizualizar_produto->VerProduto($this->PageId);

        $carregarView = new \Core\ConfigView('sts/Views/produto/operacoes/vizualizar',$this->Dados);
        $carregarView->renderizar();
    }
}