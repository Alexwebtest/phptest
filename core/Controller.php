<?php

namespace core;

abstract class Controller
{
    public $route;
    public $view;
    public $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route); // создаётся экзепляр класса View
        $this->model = $this->loadModel($route['controller']); // $this->model = new models\IndexModel; // создаётся экзепляр класса Model
    }

    public function loadModel($name)
    {
        $path = 'models\\'.ucfirst($name).'Model';
        if(class_exists($path)) {
            return new $path;
        }
    }

    public function get_site_info()
    {
        $output = $this->model->get_site_info();
        return $output;
    }
}
