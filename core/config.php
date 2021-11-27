<?php
session_start();
ob_start();
define('URL', 'http://localhost/Pizzaria/');
define('URLADM', 'http://localhost/Pizzaria/adm/');

define('CONTROLLER', 'Home');
define('METODO', 'index');

//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER','root');
define('PASS','');
define('DBNAME','pizzaria');