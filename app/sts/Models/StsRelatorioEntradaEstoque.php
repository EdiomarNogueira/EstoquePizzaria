<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}


class StsRelatorioEntradaEstoque
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



    public function RelatorioEntrada($PageId = null)
    {
        $this->PageId = (int) $PageId;
        $paginacao = new \Sts\Models\helper\StsPaginacao(URL . 'RelatorioEntradaEstoque');
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao("SELECT COUNT(id_produto) AS num_result FROM estoque_entrada"); //WHERE id_produto =:id_produto","id_produto=1
        $this->ResultadoPg = $paginacao->getResultado();


        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select estoque_entrada.id_produto, id_estoque_entrada, valor_unidade,data_entrada, qtde, nome_produto 
        FROM estoque_entrada
        INNER JOIN produtos 
        ON estoque_entrada.id_produto=produtos.id_produto LIMIT :limit OFFSET :offset", "limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listar->getResultado();

        return $this->Resultado;
    }


}
