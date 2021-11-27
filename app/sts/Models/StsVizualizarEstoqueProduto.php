<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsVizualizarEstoqueProduto
{
    private $PageId;
    private $Resultado;

    public function VerEstoqueProduto($PageId = null)
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
        estoque.data_alteracao,
        estoque.descricao_alteracao,
        estoque.id_estoque,
        estoque.qtde,
        estoque.valor_unidade
        FROM produtos 
        INNER JOIN estoque
        ON produtos.id_produto = estoque.id_produto
        WHERE  estoque.id_produto ={$this->PageId}");
        $this->Resultado = $listar->getResultado();

        return $this->Resultado;
    }
}
