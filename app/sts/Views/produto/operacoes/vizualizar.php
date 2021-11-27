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

            <div id="alterar" class="area_lista_produtos">


                <div class="elemento_lista">
                    <?php
                    if (empty($this->Dados['ver_produto'])) {
                        echo "<div class='alert-danger'> Erro: Produto não encontrado!</div>";
                    }
                    foreach ($this->Dados['ver_produto'] as $produto) {
                        extract($produto);
                    }
                    ?>

                    <div class="vProduto">
                        <div>
                            <h2>Produto: </h2>
                        </div>
                        <div class="elemento_vizualizacao">
                            <h4>Nome: </h4>
                            <p><?php echo $nome_produto; ?></p>
                        </div>
                        <div class="elemento_vizualizacao">
                            <h4>Posição de cadastro: </h4>
                            <p><?php echo $id_produto; ?></p>
                        </div>
                        <div class="elemento_vizualizacao">
                            <h4>Cadastrado em: </h4>
                            <p> <?php echo $data_criacao; ?></p>
                        </div>
                        <div class="elemento_vizualizacao">
                            <h4>Categoria: </h4>
                            <p><?php if ($categoria == 1) {
                                    echo "Ingrediente";
                                } else {
                                    echo "Bebida";
                                } ?></p>
                        </div>
                        <div class="elemento_vizualizacao">
                            <h4>Descrição: </h4>
                            <p><?php echo $descricao_produtos; ?></p>
                        </div>
                        <div class="elemento_vizualizacao">
                            <h4>Quantidade minima:</h4>
                            <p><?php echo $quantidade_minima; ?>
                                <?php if ($unidade_medida == 0) {
                                    echo "Unidades";
                                } else if ($unidade_medida == 1) {
                                    echo "ml";
                                } else if ($unidade_medida == 2) {
                                    echo "L";
                                } else if ($unidade_medida == 3) {
                                    echo "mg";
                                } else if ($unidade_medida == 4) {
                                    echo "Kg";
                                }
                                ?></p>
                        </div>
                    </div>



                    <!--<?php //echo $nome_imagem_produto; 
                        ?><br><br>-->

                </div>
            </div>
        </div>

    </div>

</main>