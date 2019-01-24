<?php

require 'lib/functions.php';

use core\Router;

spl_autoload_register(function($class) {
    //echo $class.'<br/>';
    $path = str_replace('\\','/',$class.'.php');
    if (file_exists($path)) {
        require $path; // подключает файлы классов
    }
});

session_start();

$router = new Router;
$router->run();

//phpinfo();
