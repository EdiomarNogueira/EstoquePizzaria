<?php

namespace Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}
class Funcionario
{
    public function index()
    {
        $carregarView = new \Core\ConfigView("sts/Views/funcionario/funcionario");
        $carregarView->renderizar();

    }
}
