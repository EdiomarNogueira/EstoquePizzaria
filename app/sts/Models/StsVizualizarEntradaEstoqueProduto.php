<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsVizualizarEntradaEstoqueProduto
{
    private $PageId;
    private $Resultado;

    public function VerEntradaEstoqueProduto($PageId = null)
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
        estoque_entrada.data_entrada,
        estoque_entrada.id_estoque_entrada,
        estoque_entrada.qtde,
        estoque_entrada.valor_unidade
        FROM produtos 
        INNER JOIN estoque_entrada
        ON produtos.id_produto = estoque_entrada.id_produto WHERE estoque_entrada.id_estoque_entrada ={$this->PageId}");
        $this->Resultado = $listar->getResultado();

        return $this->Resultado;
    }
}
