<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class RelatorioEntradaEstoque
{
    private $Dados;
    private $PageId;
    private $DadosForm;
    //private $DadosLista;

    public function index()
    {
      
        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId :1;

        
        $relatorio_entrada = new \Sts\Models\StsRelatorioEntradaEstoque();
        $this->Dados['entradas'] = $relatorio_entrada->RelatorioEntrada($this->PageId, $this->DadosForm);
        $this->Dados['paginacao'] = $relatorio_entrada->getResultadoPg();

        $carregarView = new \Core\ConfigView("sts/Views/relatorio/estoque/entrada", $this->Dados);
        $carregarView->renderizar();
    }
}
