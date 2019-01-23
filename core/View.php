<?php

namespace core;

class View {

    public $path;
    public $template = 'mytheme';
    public $route;

    public function __construct($route) {
        $this->route = $route;
        $this->path = '/'.$route['controller'].'/'.$route['action'];
    }

    public function render($data_array = []) {
        $path = 'views/'.$this->template.$this->path.'.php'; // путь к файлу вьюхи
        if(file_exists($path)) {
            extract($data_array);
            require 'views/'.$this->template.'/general/header.php';
            require $path;
            require 'views/'.$this->template.'/general/footer.php';
        } else {
            echo 'view not found: '.$this->path;
        }

    }

    public function redirect($url) {
        header('location :'.$url);
        exit;
    }

}