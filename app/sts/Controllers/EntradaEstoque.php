<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class EntradaEstoque
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
        if (!empty($this->Dados['cadEstoque'])) {
            unset($this->Dados['cadEstoque']);
            echo ($this->Registro);
            $cadEstoque = new \Sts\Models\StsEstoque();
            $cadEstoque->cadEstoque($this->Dados);
            $this->Dados['form'] = $this->Dados;
        }

        $carregarView = new \Core\ConfigView("sts/Views/estoque/operacoes/entrada", $this->Dados);
        $carregarView->renderizar();
    }
}
