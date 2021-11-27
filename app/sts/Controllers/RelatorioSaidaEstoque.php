<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class RelatorioSaidaEstoque
{
    private $Dados;
    private $PageId;
    private $DadosForm;
    //private $DadosLista;

    public function index()
    {
      
        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId :1;

        
        $relatorio_saida = new \Sts\Models\StsRelatorioSaidaEstoque();
        $this->Dados['saidas'] = $relatorio_saida->RelatorioSaida($this->PageId, $this->DadosForm);
        $this->Dados['paginacao'] = $relatorio_saida->getResultadoPg();

        $carregarView = new \Core\ConfigView("sts/Views/relatorio/estoque/saida", $this->Dados);
        $carregarView->renderizar();
    }
}
