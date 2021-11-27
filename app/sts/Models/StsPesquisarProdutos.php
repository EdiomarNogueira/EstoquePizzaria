<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}


class StsPesquisarProdutos
{
    private $PageId;
    private $Resultado;
    private $ResultadoPg;
    private $LimiteResultado = 5;
    private $Dados;

    public function getResultadoPg()
    {
        return $this->ResultadoPg;
    }



    public function ListarProdutos($PageId = null)
    {
        $this->PageId = (int) $PageId;
        $paginacao = new \Sts\Models\helper\StsPaginacao(URL . 'PesquisarProdutos');
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao("SELECT COUNT(id_produto) AS num_result FROM produtos"); //WHERE id_produto =:id_produto","id_produto=1
        $this->ResultadoPg = $paginacao->getResultado();


        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select id_produto, nome_produto, categoria, descricao_produtos, unidade_medida, quantidade_minima, nome_imagem_produto, data_criacao FROM produtos LIMIT :limit OFFSET :offset", "limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listar->getResultado();

        return $this->Resultado;
    }
    public function PesquisarProdutos($PageId = null, $Dados = null)
    {
        $this->PageId = (int) $PageId;
        $this->Dados = $Dados;

        $this->Dados['nome_produto'] = trim($this->Dados['nome_produto']);
        if (!empty($this->Dados['nome_produto'])) {
            $this->pesquisarProdutosNome();
        }



        return $this->Resultado;
    }

    private function pesquisarProdutosNome()
    {
        $paginacao = new \Sts\Models\helper\StsPaginacao(URL . 'PesquisarProdutos?nome_produto='.$this->Dados['nome_produto']);
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao("SELECT COUNT(id_produto) AS num_result FROM produtos WHERE nome_produto LIKE '%' :nome_produto '%'", "nome_produto={$this->Dados['nome_produto']}"); //WHERE id_produto =:id_produto","id_produto=1
        $this->ResultadoPg = $paginacao->getResultado();


        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select id_produto, nome_produto, categoria, descricao_produtos, unidade_medida, quantidade_minima, nome_imagem_produto, data_criacao FROM produtos WHERE nome_produto LIKE '%' :nome_produto '%' LIMIT :limit OFFSET :offset", "nome_produto={$this->Dados['nome_produto']}&limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listar->getResultado();
    }
}
