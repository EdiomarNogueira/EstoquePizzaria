<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsAlterarProduto
{

    public function VerProduto($PageId = null)
    {
        $this->PageId = (int) $PageId;

        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select id_produto, nome_produto, categoria, descricao_produtos, unidade_medida, quantidade_minima, nome_imagem_produto, data_criacao FROM produtos WHERE id_produto=:id_produto", "id_produto={$this->PageId}");
        $this->Resultado = $listar->getResultado();
        //var_dump($this->Resultado);

        return $this->Resultado;
    }

    public function AlterarProduto($PageId = null, $Dados = null)
    {
        $this->PageId = (int) $PageId;
        $this->Dados = $Dados;
        //$this->Dados['id_produto'][$this->PageId];
        //var_dump($this->Dados);
        //var_dump($this->PageId);

        $UpdateProduto = new \Sts\Models\helper\StsUpdate();
        $UpdateProduto->exeUpdate("produtos", $this->Dados, "WHERE id_produto =:id_produto", "id_produto=" . $this->PageId);
        //$UpdateProduto->fullRead("Select id_produto, nome_produto, categoria, descricao_produtos, unidade_medida, quantidade_minima, nome_imagem_produto, valor_unidade, data_criacao FROM produtos WHERE id_produto=:id_produto", "id_produto={$this->PageId}");
        $this->Resultado = $UpdateProduto->getResultado();

        
        if ($UpdateProduto->getResultado()) {
           echo "<div class='alert-sucess'> Cadastro de Produto Efetuado Com Sucesso!</div>";
        } else {
           echo "<div class='alert-danger'> Falha no cadastro!</div>";
        }
        //UPDATE `produtos` SET `descricao_produtos` = 'unidade de ovo s' WHERE `produtos`.`id_produto` = 5;


    }
}
