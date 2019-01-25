<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

function v($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function classes(){
    $classes = get_declared_classes();
    array_splice($classes,0,221);
    v($classes);
}
