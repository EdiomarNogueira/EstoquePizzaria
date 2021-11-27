<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SaidaEstoque
{
    private $Dados;
    private $Registro;
    //private $DadosLista;

    public function index()
    {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $listarSelect = new \Sts\Models\StsEstoque();
        $this->Dados['select'] = $listarSelect->listarProdutos();
        //var_dump($this->Registro);
        if (!empty($this->Dados['saidaEstoque'])) {
            unset($this->Dados['saidaEstoque']);
            echo ($this->Registro);
            $saidaEstoque = new \Sts\Models\StsEstoque();
            $saidaEstoque->saidaEstoque($this->Dados);
            $this->Dados['form'] = $this->Dados;
        }

        $carregarView = new \Core\ConfigView("sts/Views/estoque/operacoes/saida", $this->Dados);
        $carregarView->renderizar();
    }
}
