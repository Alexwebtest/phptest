<?php

namespace core;

class View
{
    public $path;
    public $template = 'mytheme';
    public $route;
    public $layout;

    public function __construct($route, $layout)
    {
        $this->route = $route;
        $this->path = '/'.$route['controller'].'/'.$route['action'];
        $this->layout = $layout;
    }

    public function render($data = [])
    {
        $path = 'views/'.$this->template.$this->path.'.php'; // путь к файлу вьюхи
        if (file_exists($path)) {
            extract($data);
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'views/'.$this->template.'/layouts/'.$this->layout.'.php';
            /*
            extract($data_array);
            require 'views/'.$this->template.'/general/header.php';
            require $path;
            require 'views/'.$this->template.'/general/footer.php';
            */
        } else {
            echo 'view not found: '.$this->path;
        }

    }

    public function redirect($url)
    {
        header('location :'.$url);
        exit;
    }
}
