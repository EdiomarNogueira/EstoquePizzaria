<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class PesquisarProdutos
{
    private $Dados;
    private $PageId;
    private $DadosForm;
    //private $DadosLista;

    public function index()
    {

        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId : 1;



        $this->DadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($this->DadosForm);
        if (!empty($this->DadosForm['PesquisarProduto'])) {
            unset($this->DadosForm['PesquisarProduto']);
        } else {
            $this->DadosForm['nome_produto'] = filter_input(INPUT_GET, 'nome', FILTER_DEFAULT);
        }
        $listar_produto = new \Sts\Models\StsPesquisarProdutos();
        $this->Dados['produtos'] = $listar_produto->PesquisarProdutos($this->PageId, $this->DadosForm);
        $this->Dados['paginacao'] = $listar_produto->getResultadoPg();

        $carregarView = new \Core\ConfigView("sts/Views/produto/operacoes/listar", $this->Dados);
        $carregarView->renderizarPesquisa();
    }
}
