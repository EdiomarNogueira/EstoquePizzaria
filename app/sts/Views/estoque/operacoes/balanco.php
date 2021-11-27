<?php

if (!defined('URL')) {
    header("Location: /");
    exit();
}





?>
<main class="area_trabalho">
    <div class="area_formulario">
        <div class="area_botoes">
            <div class="btn">
                <a class="personalizacao_btn" href="<?PHP echo URL . 'EntradaEstoque' ?> ">
                    <div class="btn_menu ">
                        <div>Entrada</div>
                    </div>
                </a>
            </div>
            <div class="btn">
                <a class="personalizacao_btn" href="<?PHP echo URL . 'SaidaEstoque' ?> ">
                    <div class="btn_menu">
                        <div>Saida</div>
                    </div>
                </a>
            </div>
            <div class="btn">
                <a class="personalizacao_btn" href="<?PHP echo URL . 'BalancoEstoque' ?> ">
                    <div class="btn_menu">
                        <div>Balanço de Estoque</div>
                    </div>
                </a>
            </div>
        </div>

        <div id="area_inputs" class="area_inputs">
            <div id="lista_inicial_area">
                <h1 class="titulo_sessao">Produtos Em Estoque</h1>
                <?php
                if (isset($_SESSION['msg'])) {
                    //echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                if (isset($this->Dados['form'])) {
                    $valorForm = $this->Dados['form'];
                }
                ?>
                <!--$_COOKIE-->

                <div id="alterar" class="area_lista_produtos">


                    <div class="elemento_lista">

                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr class="colunas_lista_produtos">
                                    <th>ID Produto</th>
                                    <th>Nome</th>
                                    <th>Data de Cadastro</th>
                                    <th>Categoria</th>
                                    <!--<th>Valor Unitário</th>-->
                                    <th>Qtd.Estoque</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cont = 1;
                                if (empty($this->Dados['todos_produtos'])) {
                                    echo "<div class='alert-danger'> Erro: Nenhum produto encontrado!</div>";
                                }
                                foreach ($this->Dados['todos_produtos'] as $produto) {
                                    extract($produto);
                                ?>
                                    <tr class="colunas_lista_produtos <?php echo ($cont % 2 == 1) ?  'background' : '' ?>">
                                        <th><?php echo $id_produto; ?></th>
                                        <th><?php echo $nome_produto; ?></th>
                                        <th><?php echo $data_criacao; ?></th>
                                        <th><?php if ($categoria == 1) {
                                                echo "Ingrediente";
                                            } else {
                                                echo "Bebida";
                                            }
                                            ?></th>
                                        <!--<th><?php echo 'R$ ' . $valor_unidade; ?></th>-->
                                        <th><?php
                                            switch ($unidade_medida) {
                                                case 0:

                                                    if ($qtde < $quantidade_minima) {
                                                        if ($qtde > 1) {
                                                            echo '<p class="valor_minimo">' . $qtde . " Unidades";
                                                            '</p>';
                                                        } else {
                                                            echo '<p class="valor_minimo">' . $qtde . " Unidade";
                                                            '</p>';
                                                        }
                                                    } else {
                                                        if ($qtde > 1) {
                                                            echo $qtde . " Unidades";
                                                        } else {
                                                            echo $qtde . " Unidade";
                                                        }
                                                    }
                                                    break;
                                                case 1:
                                                    if ($qtde < $quantidade_minima) {
                                                        echo '<p class="valor_minimo">' . $qtde . " ml";
                                                    } else if ($qtde > $quantidade_minima) {
                                                        echo $qtde . " ml";
                                                    }
                                                    break;
                                                case 2:
                                                    if ($qtde < $quantidade_minima) {
                                                        echo '<p class="valor_minimo">' . $qtde . " L";
                                                    } else if ($qtde > $quantidade_minima) {
                                                        echo $qtde . " L";
                                                    }
                                                    break;
                                                case 3:
                                                    if ($qtde < $quantidade_minima) {
                                                        echo '<p class="valor_minimo">' . $qtde . "mg";
                                                    } else if ($qtde > $quantidade_minima) {
                                                        echo $qtde . " mg";
                                                    }
                                                    break;
                                                case 4:
                                                    if ($qtde < $quantidade_minima) {
                                                        echo '<p class="valor_minimo">' . $qtde . " kg";
                                                    } else if ($qtde > $quantidade_minima) {
                                                        echo $qtde . " kg";
                                                    }
                                                    break;
                                            }

                                            $unidade_medida; ?></th>
                                        <th class="text-center">
                                            <span class="btn_acoes">
                                                <a href="VizualizarEstoqueProduto?id=<?= $id_produto ?>" class="btn btn-outline-primary btn-sm"><img class="img_acao" src="<?PHP echo URL ?>assets/images/icons/acoes/lupa.png" alt="Visualizar" title="Visualizar"></a>
                                                <a href="AlterarProduto?id=<?= $id_produto ?>" class="btn btn-outline-warning btn-sm"><img class="img_acao" src="<?PHP echo URL ?>assets/images/icons/acoes/engrenagem.png" alt="Alterar" title="Alterar"></a>
                                                <a href="DeletarProduto?id=<?= $id_produto ?>" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#apagarRegistro"><img class="img_acao" src="<?PHP echo URL ?>assets/images/icons/acoes/lixeira.png " alt="Excluir" title="Excluir"></a>
                                            </span>
                                        </th>
                                    </tr>

                                <?php
                                    $cont++;
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                echo $this->Dados['paginacao'];
                ?>
                <!---->
            </div>
        </div>
    </div>
</main>