<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsVizualizarProduto
{
    private $PageId;
    private $Resultado;

    public function VerProduto($PageId = null)
    {
        $this->PageId = (int) $PageId;

        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select id_produto, nome_produto, categoria, descricao_produtos, unidade_medida, quantidade_minima, nome_imagem_produto, data_criacao FROM produtos WHERE id_produto={$this->PageId}");
        $this->Resultado = $listar->getResultado();

        return $this->Resultado;
    }
}
