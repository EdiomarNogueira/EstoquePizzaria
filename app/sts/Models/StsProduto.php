<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsProduto
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

    public function cadProdutos(array $Dados)
    {
        $this->Dados = $Dados;
        $cadProdutos = new \Sts\Models\helper\StsCreate();
        $cadProdutos->exeCreate('produtos', $this->Dados);
        if ($cadProdutos->getResultado()) {
            echo "<div class='alert-sucess'> Cadastro de Produto Efetuado Com Sucesso!</div>";
        } else {
            echo "<div class='alert-danger'> Falha no cadastro!</div>";
        }
    }

    

    public function ListarTodosProdutos($PageId = null)
    {

        $this->PageId = (int) $PageId;
        $paginacao = new \Sts\Models\helper\StsPaginacao(URL . 'Produtos');
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao("SELECT COUNT(id_produto) AS num_result FROM produtos"); //WHERE id_produto =:id_produto","id_produto=1
        $this->ResultadoPg = $paginacao->getResultado();

        $listarTodos = new \Sts\Models\helper\StsRead();
        $listarTodos->fullRead("Select id_produto, nome_produto, categoria, descricao_produtos, unidade_medida, quantidade_minima,nome_imagem_produto, data_criacao FROM produtos LIMIT :limit OFFSET :offset", "limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listarTodos->getResultado();

        return $this->Resultado;
    }

    public function SelecionarProduto($PageId = null){
        $this->PageId = (int) $PageId;

        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select id_produto, nome_produto, categoria, descricao_produtos, unidade_medida, quantidade_minima, nome_imagem_produto, data_criacao FROM produtos WHERE id_produto={$this->PageId}");
        $this->Resultado = $listar->getResultado();

        return $this->Resultado;
    }
}


//class StsListarProduto {
 //   private $Resultado;
  //  public function ListarProdutos(){
   //     $listar= new \Sts\Models\helper\StsRead();
    //    $listar->fullRead('SELECT nome_produto,valor_mercado,unidade_medida,id_produto,nome_imagem_produto,descricao_produtos,data_criacao,categoria FROM pizzaria ORDER BY id_produto DESC LIMIT :limit','limit=2');
     //   $this->Resultado = $listar->getResultado();
      //  var_dump($this->Resultado);
       // return $this->Resultado;
  //  }
//}