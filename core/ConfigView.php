<?php

namespace Core;


class ConfigView
{
    private $Nome;
    private $Dados;
    //private $DadosLista;


    public function __construct($Nome, array $Dados = null)
    {
        $this->Nome = (string) $Nome;
        $this->Dados = $Dados;
        //$this->Dados = $DadosLista;
    }


    public function renderizar()
    {
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/sts/Views/include/cabecalho.php';
            include 'app/sts/Views/include/menu.php';
            include 'app/' . $this->Nome . '.php';
            include 'app/sts/Views/include/rodape.php';

            //include 'app/sts/Views/include/menuNavbar.php';
            //include 'app/sts/Views/include/menuComplementar.php';
            //include 'app/sts/Views/home/home.php';
        } else {
            //echo "Erro ao carregar a página<br>";
            echo "Erro no carregamento de view: {$this->nome}";
        }
    }

    
    public function renderizarPesquisa()
    {
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/sts/Views/include/cabecalho.php';
            include 'app/sts/Views/include/menu.php';
            include 'app/' . $this->Nome . '.php';
            include 'app/sts/Views/include/rodape.php';

            //include 'app/sts/Views/include/menuNavbar.php';
            //include 'app/sts/Views/include/menuComplementar.php';
            //include 'app/sts/Views/home/home.php';
        } else {
            //echo "Erro ao carregar a página<br>";
            echo "Erro no carregamento de view: {$this->nome}";
        }
    }
}
