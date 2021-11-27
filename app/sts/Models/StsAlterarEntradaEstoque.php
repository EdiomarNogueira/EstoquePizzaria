<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsAlterarEntradaEstoque
{

    public function VerEntradaEstoque($PageId = null)
    {
        $this->PageId = (int) $PageId;

        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("SELECT * FROM estoque_entrada WHERE id_estoque_entrada=:id_estoque_entrada", "id_estoque_entrada={$this->PageId}");
        $this->Resultado = $listar->getResultado();
        //var_dump($this->Resultado);

        return $this->Resultado;
    }

    public function AlterarEntradaEstoque($PageId = null, $Dados = null)
    {

        $this->PageId = (int) $PageId;
        $this->Dados = $Dados;
        //$this->Dados['id_produto'][$this->PageId];
        //var_dump($this->Dados);
        //var_dump($this->PageId);
        $UpdateProduto = new \Sts\Models\helper\StsUpdate();
        $UpdateProduto->exeUpdate("estoque_entrada", $this->Dados, "WHERE id_estoque_entrada =:id_estoque_entrada", "id_estoque_entrada=".$this->PageId);
        

        //$UpdateProduto->fullRead("Select id_produto, nome_produto, categoria, descricao_produtos, unidade_medida, quantidade_minima, nome_imagem_produto, valor_unidade, data_criacao FROM produtos WHERE id_produto=:id_produto", "id_produto={$this->PageId}");
        $this->Resultado = $UpdateProduto->getResultado();


        if ($UpdateProduto->getResultado()) {
           echo "<div class='alert-sucess'> Update Efetuado Com Sucesso!</div>";
           //var_dump($this->Resultado);

        } else {
           echo "<div class='alert-danger'> Falha no Update!</div>";
        }
        //UPDATE `produtos` SET `descricao_produtos` = 'unidade de ovo s' WHERE `produtos`.`id_produto` = 5;


    }
    public function listarProdutos(){
        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select id_produto, nome_produto FROM produtos ORDER BY id_produto ASC");
        $registro['produtos'] = $listar->getResultado();
        $this->Resultado = array($registro['produtos']);
        return $this->Resultado;
    }
}
