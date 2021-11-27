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
        <div class="area_inputs">
            <div id="lista_inicial_area">
                <h1 class="titulo_sessao">Relatórios</h1>
            </div>
        </div>
    </div>
</main>