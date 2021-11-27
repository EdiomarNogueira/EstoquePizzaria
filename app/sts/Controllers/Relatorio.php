<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Relatorio
{
    private $Dados;
    private $PageId;

    //private $DadosLista;

    public function index()
    {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['cadEstoque'])) {
            unset($this->Dados['cadEstoque']);
            $cadEstoque = new \Sts\Models\StsEstoque();
            $cadEstoque->cadEstoque($this->Dados);
            $this->Dados['form'] = $this->Dados;
        }

        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId :1;
        $listar_Estoque = new \Sts\Models\StsEstoque();

        $this->Dados['todos_produtos_estoque'] = $listar_Estoque->ListarEstoque($this->PageId);
        $this->Dados['paginacao'] = $listar_Estoque->getResultadoPg();
        $carregarView = new \Core\ConfigView("sts/Views/relatorio/relatorio", $this->Dados);
        $carregarView->renderizar();

    }
}
