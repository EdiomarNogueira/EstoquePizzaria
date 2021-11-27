<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsVizualizarSaidaEstoqueProduto
{
    private $PageId;
    private $Resultado;

    public function VerSaidaEstoqueProduto($PageId = null)
    {
        $this->PageId = (int) $PageId;

        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select produtos.id_produto, 
        produtos.nome_produto, 
        produtos.categoria, 
        produtos.descricao_produtos, 
        produtos.unidade_medida, 
        produtos.quantidade_minima, 
        produtos.nome_imagem_produto, 
        produtos.data_criacao,
        estoque_saida.data_saida,
        estoque_saida.id_estoque_saida,
        estoque_saida.qtde,
        estoque_saida.valor_unidade
        FROM produtos 
        INNER JOIN estoque_saida
        ON produtos.id_produto = estoque_saida.id_produto WHERE estoque_saida.id_estoque_saida ={$this->PageId}");
        $this->Resultado = $listar->getResultado();

        return $this->Resultado;
    }
}
