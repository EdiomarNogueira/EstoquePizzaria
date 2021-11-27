<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Produtos
{
    private $Dados;
    private $PageId;

    //private $DadosLista;

    public function index()
    {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['cadProduto'])) {
            unset($this->Dados['cadProduto']);
            $cadProdutos = new \Sts\Models\StsProduto();
            $cadProdutos->cadProdutos($this->Dados);
            $this->Dados['form'] = $this->Dados;
        }

        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId :1;
        $listar_todos_produtos = new \Sts\Models\StsProduto();

        $this->Dados['todos_produtos'] = $listar_todos_produtos->ListarTodosProdutos($this->PageId);
        $this->Dados['paginacao'] = $listar_todos_produtos->getResultadoPg();
        $carregarView = new \Core\ConfigView("sts/Views/produto/produto", $this->Dados);
        $carregarView->renderizar();

    }
}
