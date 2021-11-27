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
                <a class="personalizacao_btn" href="<?PHP echo URL . 'CadastrarProdutos' ?> ">
                    <div class="btn_menu ">
                        <div>Cadastrar Produto</div>
                    </div>
                </a>
                <!--<button onclick="cadastrar()" class="personalizacao_btn">Cadastrar Produto</button>-->
            </div>
            <!--<div class="btn">
                <button onclick="alterar()" class="personalizacao_btn">Alterar Produto</button>
            </div>
            <div class="btn">
                <button onclick="excluir()" class="personalizacao_btn">Excluir Produto</button>
            </div>-->
            <div class="btn">
                <a class="personalizacao_btn" href="<?PHP echo URL . 'PesquisarProdutos' ?> ">
                    <div class="btn_menu">
                        <div>Pesquisar Produto</div>
                    </div>
                </a>
                <!--<button onclick="listar()" class="personalizacao_btn">Pesquisar Produto</button>-->
            </div>
        </div>

        <div id="area_inputs" class="area_inputs">
            <div id="lista_inicial_area">
                <h1 class="titulo_sessao">Produtos</h1>
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

                                        <th class="text-center">
                                            <span class="btn_acoes">
                                                <a href="VizualizarProduto?id=<?= $id_produto ?>" class="btn btn-outline-primary btn-sm"><img class="img_acao" src="<?PHP echo URL ?>assets/images/icons/acoes/lupa.png" alt="Visualizar" title="Visualizar"></a>
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