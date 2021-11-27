<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsDeletarSaidaEstoque
{
    private $PageId;
    //function getResultado()
    //{
    //    return $this->Resultado;
    //}


    public function DeletarSaidaEstoque($PageId = null)
    {
        $this->PageId = (int) $PageId;

        $deletar_Produto = new  \Sts\Models\helper\StsDelete();

        $this->Resultado = $deletar_Produto->getResultado();


        $deletar_Produto->exeDelete("estoque_Saida ","WHERE estoque_Saida.id_estoque_Saida = {$this->PageId}","");



        if ($deletar_Produto->getResultado()) {
            echo "<div class='alert-success'>Saida de Estoque Cancelada!</div>";
            $this->Resultado = true;
        } else {
            echo "<div class='alert-danger'>Erro: A Saida Não Foi Apagada!</div>";

            $this->Resultado = false;
        }
    }
}
