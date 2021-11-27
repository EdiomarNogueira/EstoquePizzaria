<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsDeletarProduto
{
    private $PageId;
    private $Resultado;
    public $cont;
    //function getResultado()
    //{
    //    return $this->Resultado;
    //}


    public function DeletarProduto($PageId = null)
    {
        $this->cont = 4;
        $this->PageId = (int) $PageId;

        var_dump($this->PageId);
        $deletar_Produto = new  \Sts\Models\helper\StsDelete();




        $this->Resultado = $deletar_Produto->getResultado();
        while ($this->cont > 0) {
            $deletar_Produto->exeDelete("produtos", "WHERE id_produto =:id_produto", "id_produto={$this->PageId}");
            $deletar_Produto->exeDelete("estoque_entrada", "WHERE id_produto =:id_produto", "id_produto={$this->PageId}");
            $deletar_Produto->exeDelete("estoque_saida", "WHERE id_produto =:id_produto", "id_produto={$this->PageId}");
            $deletar_Produto->exeDelete("estoque", "WHERE id_produto =:id_produto", "id_produto={$this->PageId}");
            $this->cont = $this->cont - 1;
        }


        if ($deletar_Produto->getResultado()) {
            echo "<div class='alert-success'>Produto apagado com sucesso!</div>";

            $this->Resultado = true;
        } else {
            echo "<div class='alert-danger'>Erro: Produto não foi apagado!</div>";

            $this->Resultado = false;
        }
    }
}
