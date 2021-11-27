<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AlterarProduto
{
    private $Dados;
    private $PageId;

    //private $DadosLista;

    public function index()
    {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->PageId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (!empty($this->Dados['alterar_produto'])) {
            unset($this->Dados['alterar_produto']);
            $AlterProdutos = new \Sts\Models\StsAlterarProduto();
            $AlterProdutos->AlterarProduto($this->PageId,$this->Dados);
            $this->Dados['form'] = $this->Dados;
            //var_dump($this->Dados);
            //var_dump($this->PageId);
        }


        $this->PageId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $ver_produto = new \Sts\Models\StsAlterarProduto();

        $this->Dados['ver_produto'] = $ver_produto->VerProduto($this->PageId);
        //var_dump($this->Dados);

        $carregarView = new \Core\ConfigView("sts/Views/produto/operacoes/alterar", $this->Dados);
        $carregarView->renderizar();
    }
}
