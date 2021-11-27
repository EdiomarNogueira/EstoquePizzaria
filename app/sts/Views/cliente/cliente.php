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
                <button onclick="cadastrar()" class="personalizacao_btn">Cadastrar Cliente</button>
            </div>
            <div class="btn">
                <button onclick="alterar()" class="personalizacao_btn">Alterar Cliente</button>
            </div>
            <div class="btn">
                <button onclick="excluir()" class="personalizacao_btn">Excluir Cliente</button>
            </div>
            <div class="btn">
                <button onclick="listar()" class="personalizacao_btn">Listar Cliente</button>
            </div>
        </div>
        <div class="area_inputs">
            <div id="lista_inicial_area">
                <h1>Operações de Cliente</h1>
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