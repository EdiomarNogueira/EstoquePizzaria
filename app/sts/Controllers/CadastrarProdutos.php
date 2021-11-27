<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class CadastrarProdutos
{
    private $Dados;
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

        $carregarView = new \Core\ConfigView("sts/Views/produto/operacoes/cadastrar", $this->Dados);
        $carregarView->renderizar();
    }
}
