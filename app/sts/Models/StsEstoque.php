<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsEstoque
{
    private $Dados;
    private $PageId;
    private $Resultado;
    private $ResultadoPg;
    private $LimiteResultado = 10;

    public function getResultadoPg()
    {
        return $this->ResultadoPg;
    }

  
    public function cadEstoque(array $Dados)
    {
        $this->Dados = $Dados;
        $cadEstoque = new \Sts\Models\helper\StsCreate();
        $cadEstoque->exeCreate('estoque_entrada', $this->Dados);
        if ($cadEstoque->getResultado()) {
            echo "<div class='alert-sucess'> Cadastro de Produto Efetuado Com Sucesso!</div>";
        } else {
            echo "<div class='alert-danger'> Falha no cadastro!</div>";
        }
    }


    public function AlterarEntradaEstoque($PageId = null, $Dados = null)
    {
        $this->PageId = (int) $PageId;
        $this->Dados = $Dados;
        //$this->Dados['id_produto'][$this->PageId];
        //var_dump($this->Dados);
        //var_dump($this->PageId);

        $UpdateProduto = new \Sts\Models\helper\StsUpdate();
        $UpdateProduto->exeUpdate("estoque_entrada", $this->Dados, "WHERE estoque_entrada=:id_estoque_entrada","id_estoque_entrada=" . $this->PageId);



        //$UpdateProduto->fullRead("Select id_produto, nome_produto, categoria, descricao_produtos, unidade_medida, quantidade_minima, nome_imagem_produto, valor_unidade, data_criacao FROM produtos WHERE id_produto=:id_produto", "id_produto={$this->PageId}");
        $this->Resultado = $UpdateProduto->getResultado();


        if ($UpdateProduto->getResultado()) {
           echo "<div class='alert-sucess'> Cadastro de Produto Efetuado Com Sucesso!</div>";
        } else {
           echo "<div class='alert-danger'> Falha no cadastro!</div>";
        }
        //UPDATE `produtos` SET `descricao_produtos` = 'unidade de ovo s' WHERE `produtos`.`id_produto` = 5;


    }

    public function saidaEstoque(array $Dados)
    {
        $this->Dados = $Dados;
        $saidaEstoque = new \Sts\Models\helper\StsCreate();

        $verificaQuantidade = new \Sts\Models\helper\StsRead();
        $verificaQuantidade->fullRead("Select estoque.id_produto, estoque.qtde,estoque.valor_unidade FROM estoque WHERE estoque.id_produto={$this->Dados['id_produto']};");
        $verifica['estoque'] = $verificaQuantidade->getResultado();
                
        $qtde= $verifica['estoque'][0]['qtde'];

        if($this->Dados['qtde']>$qtde){
            echo "<div class='alert-danger'>Não Permitido, quantidade de saida maior do que mantida em estoque!</div>";
        } else {
            $saidaEstoque->exeCreate('estoque_saida', $this->Dados);
        }

        if ($saidaEstoque->getResultado()) {
            echo "<div class='alert-sucess'> Cadastro de Saida Efetuado Com Sucesso!</div>";
        } else {
            echo "<div class='alert-danger'> Falha no cadastro!</div>";
        }
    }


    public function listarProdutos(){
        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select id_produto, nome_produto FROM produtos ORDER BY id_produto ASC");
        $registro['produtos'] = $listar->getResultado();
        $this->Resultado = array($registro['produtos']);
        return $this->Resultado;
    }

    public function ListarEstoque($PageId = null)
    {

        $this->PageId = (int) $PageId;
        $paginacao = new \Sts\Models\helper\StsPaginacao(URL . 'Estoque');
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao("SELECT COUNT(id_produto) AS num_result FROM produtos"); //WHERE id_produto =:id_produto","id_produto=1
        $this->ResultadoPg = $paginacao->getResultado();

        $listarTodos = new \Sts\Models\helper\StsRead();
        $listarTodos->fullRead("Select id_produto, nome_produto, categoria, descricao_produtos, unidade_medida, quantidade_minima,nome_imagem_produto, data_criacao FROM produtos LIMIT :limit OFFSET :offset", "limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listarTodos->getResultado();

        return $this->Resultado;
    }

    public function SelecionarEstoque($PageId = null){
        $this->PageId = (int) $PageId;

        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select id_produto, nome_produto, categoria, descricao_produtos, unidade_medida, quantidade_minima, nome_imagem_produto, data_criacao FROM produtos WHERE id_produto={$this->PageId}");
        $this->Resultado = $listar->getResultado();

        return $this->Resultado;
    }
}

