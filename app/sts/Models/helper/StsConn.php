<?php

namespace Sts\Models\helper;

use Exception;
use PDO;
if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsConn
{
    public static $Host = HOST;
    public static $User = USER;
    public static $Pass = PASS;
    public static $Dbname = DBNAME;
    private static $Connect = null;


    private static function conectar()
    {
        try {
            if (self::$Connect == null) {
                self::$Connect = new PDO('mysql:host=' . self::$Host . ';dbname=' . self::$Dbname, self::$User, self::$Pass);
            }
        } catch (Exception $exc) {
            echo 'Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador @ediomar.nogueira ' . $exc->getMessage();
            die;
        }
        return self::$Connect;
    }

    public function getConn()
    {
        return self::conectar();
    }
}
