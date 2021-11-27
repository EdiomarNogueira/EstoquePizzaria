<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsEntradaEstoque {


    public function PesquisarProdutos(){
        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select id_produto, nome_produto FROM produtos ORDER BY id_produto ASC");
        $registro['produtos'] = $listar->getResultado();
        $this->Resultado = array($registro['produtos']);
        return $this->Resultado;
    }
}
