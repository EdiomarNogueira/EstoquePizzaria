<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}
class Entrada
{
    public function index()
    {
        $carregarView = new \Core\ConfigView("sts/Views/entrada/entrada");
        $carregarView->renderizar();

    }
}
