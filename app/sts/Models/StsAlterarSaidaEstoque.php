<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsAlterarSaidaEstoque
{

    public function VerSaidaEstoque($PageId = null)
    {
        $this->PageId = (int) $PageId;

        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("SELECT * FROM estoque_saida WHERE id_estoque_saida=:id_estoque_saida", "id_estoque_saida={$this->PageId}");
        $this->Resultado = $listar->getResultado();
        //var_dump($this->Resultado);

        return $this->Resultado;
    }

    public function AlterarSaidaEstoque($PageId = null, $Dados = null)
    {

        $this->PageId = (int) $PageId;
        $this->Dados = $Dados;
        //$this->Dados['id_produto'][$this->PageId];
        //var_dump($this->Dados);
        //var_dump($this->PageId);

        $verificaQuantidade = new \Sts\Models\helper\StsRead();
        $verificaQuantidade->fullRead("Select estoque.id_produto, estoque.qtde,estoque.valor_unidade FROM estoque WHERE estoque.id_produto={$this->Dados['id_produto']};");
        $verifica['estoque'] = $verificaQuantidade->getResultado();
                
        $qtde= $verifica['estoque'][0]['qtde'];

        $UpdateProduto = new \Sts\Models\helper\StsUpdate();
        if($this->Dados['qtde']>$qtde){
            echo "<div class='alert-danger'>Não Permitido, quantidade de saida maior do que mantida em estoque!</div>";

        } else {
            $UpdateProduto->exeUpdate("estoque_saida", $this->Dados, "WHERE id_estoque_saida =:id_estoque_saida", "id_estoque_saida=".$this->PageId);
        }

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


