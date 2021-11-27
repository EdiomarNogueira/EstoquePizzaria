<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsBalancoEstoque
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

    public function cadEstoques(array $Dados)
    {
        $this->Dados = $Dados;
        $cadEstoques = new \Sts\Models\helper\StsCreate();
        $cadEstoques->exeCreate('produtos', $this->Dados);
        if ($cadEstoques->getResultado()) {
            echo "<div class='alert-sucess'> Cadastro de Produto Efetuado Com Sucesso!</div>";
        } else {
            echo "<div class='alert-danger'> Falha no cadastro!</div>";
        }
    }

    

    public function ListarTodosEstoques($PageId = null)
    {

        $this->PageId = (int) $PageId;
        $paginacao = new \Sts\Models\helper\StsPaginacao(URL . 'Produtos');
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao("SELECT COUNT(id_produto) AS num_result FROM produtos"); //WHERE id_produto =:id_produto","id_produto=1
        $this->ResultadoPg = $paginacao->getResultado();

        $listarTodos = new \Sts\Models\helper\StsRead();
        $listarTodos->fullRead("Select* FROM produtos INNER JOIN estoque ON produtos.id_produto=estoque.id_produto;
        LIMIT :limit OFFSET :offset", "limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listarTodos->getResultado();

        return $this->Resultado;
    }

    public function SelecionarEstoque($PageId = null){
        $this->PageId = (int) $PageId;

        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("Select* FROM produtos INNER JOIN estoque ON produtos.id_produto=estoque.id_produto WHERE produtos.id_produto ={$this->PageId}");
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