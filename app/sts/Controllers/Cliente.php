<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}
class Cliente
{
    public function index()
    {
        $carregarView = new \Core\ConfigView("sts/Views/cliente/cliente");
        $carregarView->renderizar();

    }
}
