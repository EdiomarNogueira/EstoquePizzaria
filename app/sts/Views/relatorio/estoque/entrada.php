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
                <a class="personalizacao_btn" href="<?PHP echo URL . 'RelatorioEntradaEstoque' ?> ">
                    <div class="btn_menu ">
                        <div>Entradas em Estoque</div>
                    </div>
                </a>
            </div>
            <div class="btn">
                <a class="personalizacao_btn" href="<?PHP echo URL . 'RelatorioSaidaEstoque' ?> ">
                    <div class="btn_menu ">
                        <div>Saídas de Estoque</div>
                    </div>
                </a>
            </div>
        </div>

        <div id="area_inputs" class="area_inputs">

            <div id="alterar" class="area_lista_produtos">

                <h1 class="titulo_sessao">Entradas em Estoque</h1>
                <div class="elemento_lista">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr class="colunas_lista_produtos">
                                <th>ID Entrada</th>
                                <th>ID Produto</th>
                                <th>Produto</th>
                                <th>Qtd.Adquirida</th>
                                <th>Valor/Unidade</th>
                                <th>Data de Compra</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cont = 1;
                            if (empty($this->Dados['entradas'])) {
                                echo "<div class='alert-danger'> Erro: Nenhuma entrada encontrada!</div>";
                            }

                            if (!empty($this->Dados['entradas'])) {
                                foreach ($this->Dados['entradas'] as $produto) {
                                    extract($produto);
                            ?>
                                    <tr class="colunas_lista_produtos <?php echo ($cont % 2 == 1) ?  'background' : '' ?>">
                                        <th><?php echo $id_estoque_entrada; ?></th>
                                        <th><?php echo $id_produto; ?></th>
                                        <th><?php echo $nome_produto; ?></th>
                                        <th><?php echo $qtde; ?></th>
                                        <th><?php echo $valor_unidade; ?></th>
                                        <th><?php echo $data_entrada; ?></th>
                                        <th class="text-center">
                                            <span class="btn_acoes">
                                                <a href="VizualizarEntradaEstoqueProduto?id=<?= $id_estoque_entrada ?>" class="btn btn-outline-primary btn-sm"><img class="img_acao" src="<?PHP echo URL ?>assets/images/icons/acoes/lupa.png" alt="Visualizar" title="Visualizar"></a>
                                                <a href="AlterarEntradaEstoque?id=<?= $id_estoque_entrada ?>" class="btn btn-outline-warning btn-sm"><img class="img_acao" src="<?PHP echo URL ?>assets/images/icons/acoes/engrenagem.png" alt="Alterar" title="Alterar"></a>
                                                <a href="DeletarEntradaEstoque?id=<?= $id_estoque_entrada ?>" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#apagarRegistro"><img class="img_acao" src="<?PHP echo URL ?>assets/images/icons/acoes/lixeira.png " alt="Excluir" title="Excluir"></a>
                                            </span>
                                        </th>
                                    </tr>
                            <?php

                                    $cont++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                <div>
                    <?php
                    if (!empty($this->Dados['paginacao'])) {
                        echo $this->Dados['paginacao'];
                    }
                    ?>
                </div>


            </div>
        </div>

    </div>

</main>