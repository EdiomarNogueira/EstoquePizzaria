<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}
class Pedido
{
    public function index()
    {
        $carregarView = new \Core\ConfigView("sts/Views/pedido/pedido");
        $carregarView->renderizar();
    }
}
