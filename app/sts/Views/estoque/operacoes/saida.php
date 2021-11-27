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

            <div id="cadastro" class="area_inputs">

                <form method="POST" action="Estoque" enctype="multipart/form-data">
                    <h1 class="titulo_operacao">Saída de Estoque</h1>
                    <div class="form_option">
                        <label class="select_option">Produto: </label>
                        <select class="input_grande" name="id_produto">
                            <option class="option_conf" value="">Selecione</option>
                            <?php

                            foreach ($this->Dados['select']['0'] as $produto) {
                                extract($produto);
                                echo "<option class='option_conf' value='$id_produto'>$nome_produto</option>";
                            }
                            ?>
                            <!-- ... -->
                        </select>
                    </div>
                    <div>
                        <div class="form_float">
                            <input class="input_pequeno" vtype="text" name="qtde" placeholder=" " value="<?php if (isset($valorForm['qtde'])) {
                                                                                                                                    echo $valorForm['qtde'];
                                                                                                                                } ?>">
                            <label>Q.Saída:</label>
                        </div>




                        <input name="data_saida" type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>">

                    </div>
                    <div class="area_btn">
                        <div class="btn">
                            <input class="personalizacao_btn  salvar" type="submit" value="Salvar" name="saidaEstoque">

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