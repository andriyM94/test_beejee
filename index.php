<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str) {
    echo "<pre>";
    var_dump($str);
    echo "</pre>";
    exit;
}

use app\router;

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)){
        require $path;
    }
});

$router = new Router;
$router->run();
?>