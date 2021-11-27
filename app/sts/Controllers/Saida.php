<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}
class Saida
{
    public function index()
    {
        $carregarView = new \Core\ConfigView("sts/Views/saida/saida");
        $carregarView->renderizar();

    }
}
