<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class BalancoEstoque
{
    private $Dados;
    private $PageId;

    //private $DadosLista;

    public function index()
    {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['cadEstoque'])) {
            unset($this->Dados['cadEstoque']);
            $cadEstoques = new \Sts\Models\StsBalancoEstoque();
            $cadEstoques->cadEstoques($this->Dados);
            $this->Dados['form'] = $this->Dados;
        }

        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId :1;
        $listar_todos_produtos = new \Sts\Models\StsBalancoEstoque();

        $this->Dados['todos_produtos'] = $listar_todos_produtos->ListarTodosEstoques($this->PageId);
        $this->Dados['paginacao'] = $listar_todos_produtos->getResultadoPg();
        $carregarView = new \Core\ConfigView("sts/Views/estoque/operacoes/balanco", $this->Dados);
        $carregarView->renderizar();

    }
}
