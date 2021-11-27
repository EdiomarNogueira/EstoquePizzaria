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

            <div id="cadastro" class="area_inputs">

                <form method="POST" action="Produtos" enctype="multipart/form-data">
                    <h1 class="titulo_operacao">Cadastro de Produto</h1>

                    <div>
                        <div class="form_float">
                            <input class="input_grande" type="text" name="nome_produto" placeholder=" " value="<?php if (isset($valorForm['nome_produto'])) {
                                                                                                                    echo $valorForm['nome_produto'];
                                                                                                                } ?>">
                            <label>Nome Produto:</label>
                        </div>
                        <div class="form_float">
                            <input class="input_grande" vtype="text" name="descricao_produtos" placeholder=" " value="<?php if (isset($valorForm['descricao_produtos'])) {
                                                                                                                            echo $valorForm['descricao_produtos'];
                                                                                                                        } ?>">
                            <label>Descrição:</label>
                        </div>
                        
                        <div class="form_float">
                            <input class="input_pequeno" vtype="text" name="quantidade_minima" placeholder=" " value="<?php if (isset($valorForm['quantidade_minima'])) {
                                                                                                                            echo $valorForm['quantidade_minima'];
                                                                                                                        } ?>">
                            <label>Quantidade mínima:</label>
                        </div>
                        <div class="form_option">
                            <label class="select_option">Unidade de Medida: </label>
                            <select class="input_medio " name="unidade_medida">
                                <option class="option_conf" value="0">Unidade</option>
                                <option class="option_conf" value="1">ml</option>
                                <option class="option_conf" value="2">L</option>
                                <option class="option_conf" value="3">mg</option>
                                <option class="option_conf" value="4">Kg</option>
                                <!-- ... -->
                            </select>
                        </div>


                        <input name="data_criacao" type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>">


                        <!--<div class="form_imagem">
            <h3>Carregue uma imagem:</h3>
            <p>Selecione uma foto para ser exibida (.jpg, .jpeg, .png).</p>
            <input id="img_produto" type="file" name="nome_imagem_produto"/>
            <div id="preview_img"></div>
        </div>-->

                        <div class="form_option">
                            <label class="select_option">Categoria: </label>
                            <select class="input_medio " name="categoria">
                                <option class="option_conf" value="1">Ingrediente</option>
                                <option class="option_conf" value="2">Bebida</option>
                                <!-- ... -->
                            </select>

                        </div>
                    </div>
                    <div class="area_btn">
                        <div class="btn">
                            <input class="personalizacao_btn  salvar" type="submit" value="Salvar" name="cadProduto">

                            <a class="personalizacao_btn cancelar" href="<?PHP echo URL . 'Home' ?> ">
                                <div class="btn_menu">
                                    <div>Cancelar</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>