<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}


class StsRelatorioSaidaEstoque
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



    public function RelatorioSaida($PageId = null)
    {
        $this->PageId = (int) $PageId;
        $paginacao = new \Sts\Models\helper\StsPaginacao(URL . 'RelatorioSaidaEstoque');
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao("SELECT COUNT(id_produto) AS num_result FROM estoque_saida"); //WHERE id_produto =:id_produto","id_produto=1
        $this->ResultadoPg = $paginacao->getResultado();


        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select estoque_saida.id_produto, id_estoque_saida, data_saida, qtde, nome_produto 
        FROM estoque_saida
        INNER JOIN produtos 
        ON estoque_saida.id_produto=produtos.id_produto LIMIT :limit OFFSET :offset", "limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listar->getResultado();

        return $this->Resultado;
    }


}
