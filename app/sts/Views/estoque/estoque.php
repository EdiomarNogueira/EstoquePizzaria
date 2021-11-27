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
        <div class="area_inputs">
            <div id="lista_inicial_area">                
                <h1 class="titulo_sessao">Operações de Estoque</h1>
            </div>
            <div id="cadastrar" class="ocultar">
                <?php
                include_once("operacoes/cadastrar.php");
                ?>
            </div>

            <div id="alterar" class="ocultar">
                <?php
                include_once("operacoes/alterar.php");
                ?>
            </div>

            <div id="excluir" class="ocultar">
                <?php
                include_once("operacoes/excluir.php");
                ?>
            </div>

            <div id="listar" class="ocultar">
                <?php
                include_once("operacoes/listar.php");
                ?>
            </div>
        </div>
    </div>
</main>