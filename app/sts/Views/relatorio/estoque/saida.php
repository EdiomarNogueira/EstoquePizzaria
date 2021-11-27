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

                <h1 class="titulo_sessao">Saídas de Estoque</h1>
                <div class="elemento_lista">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr class="colunas_lista_produtos">
                                <th>ID Saída</th>
                                <th>ID Produto</th>
                                <th>Nome do Produto</th>
                                <th>Qtd.Usada</th>
                                <th>Data de Uso</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cont = 1;
                            if (empty($this->Dados['saidas'])) {
                                echo "<div class='alert-danger'> Erro: Nenhuma saida encontrada!</div>";
                            }

                            if (!empty($this->Dados['saidas'])) {
                                foreach ($this->Dados['saidas'] as $produto) {
                                    extract($produto);
                            ?>
                                    <tr class="colunas_lista_produtos <?php echo ($cont % 2 == 1) ?  'background' : '' ?>">
                                        <th><?php echo $id_estoque_saida; ?></th>
                                        <th><?php echo $id_produto; ?></th>
                                        <th><?php echo $nome_produto; ?></th>
                                        <th><?php echo $qtde; ?></th>
                                        <th><?php echo $data_saida; ?></th>
                                        <th class="text-center">
                                            <span class="btn_acoes">
                                                <a href="VizualizarSaidaEstoqueProduto?id=<?= $id_estoque_saida ?>" class="btn btn-outline-primary btn-sm"><img class="img_acao" src="<?PHP echo URL ?>assets/images/icons/acoes/lupa.png" alt="Visualizar" title="Visualizar"></a>
                                                <a href="AlterarSaidaEstoque?id=<?= $id_estoque_saida ?>" class="btn btn-outline-warning btn-sm"><img class="img_acao" src="<?PHP echo URL ?>assets/images/icons/acoes/engrenagem.png" alt="Alterar" title="Alterar"></a>
                                                <a href="DeletarSaidaEstoque?id=<?= $id_estoque_saida ?>" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#apagarRegistro"><img class="img_acao" src="<?PHP echo URL ?>assets/images/icons/acoes/lixeira.png " alt="Excluir" title="Excluir"></a>
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