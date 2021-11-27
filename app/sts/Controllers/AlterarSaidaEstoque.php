<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AlterarSaidaEstoque
{
    private $Dados;
    private $PageId;
    private $Registro;
    //private $DadosLista;

    public function index()
    {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->PageId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (!empty($this->Dados['alterar_produto'])) {
            unset($this->Dados['alterar_produto']);
            $AlterProdutos = new \Sts\Models\StsAlterarSaidaEstoque();
            $AlterProdutos->AlterarSaidaEstoque($this->PageId,$this->Dados);
            $this->Dados['form'] = $this->Dados;
        }
        //
        $this->PageId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $ver_produto = new \Sts\Models\StsAlterarSaidaEstoque();
        $this->Dados['alterar_produto'] = $ver_produto->VerSaidaEstoque($this->PageId);
        //var_dump($this->Dados);

        $listarSelect = new \Sts\Models\StsAlterarSaidaEstoque();
        $this->Dados['select'] = $listarSelect->listarProdutos();

   

        $carregarView = new \Core\ConfigView("sts/Views/estoque/operacoes/alterarSaida", $this->Dados);
        $carregarView->renderizar();
    }
}
