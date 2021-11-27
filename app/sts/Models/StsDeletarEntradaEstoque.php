<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsDeletarEntradaEstoque
{
    private $PageId;
    //function getResultado()
    //{
    //    return $this->Resultado;
    //}


    public function DeletarEntradaEstoque($PageId = null)
    {
        $this->PageId = (int) $PageId;

        $deletar_Produto = new  \Sts\Models\helper\StsDelete();

        $this->Resultado = $deletar_Produto->getResultado();


        $deletar_Produto->exeDelete("estoque_entrada ","WHERE estoque_entrada.id_estoque_entrada = {$this->PageId}","");



        if ($deletar_Produto->getResultado()) {
            echo "<div class='alert-success'>Entrada Em Estoque Apagada Com Sucesso!</div>";
            $this->Resultado = true;
        } else {
            echo "<div class='alert-danger'>Erro: Saida de Estoque Não Foi Apagado!</div>";

            $this->Resultado = false;
        }
    }
}
