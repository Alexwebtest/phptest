<?php

namespace core;

abstract class Controller
{
    public $route;
    public $view;
    public $model;
    public $layout = 'main';
    public $data = array();

    public function __construct($route)
    {
        $this->route = $route;
        $layout = $this->layout;
        $this->view = new View($route, $layout); // создаётся экзепляр класса View
        $this->model = $this->loadModel($route['controller']); // $this->model = new models\IndexModel; // создаётся экзепляр класса Model
        $this->data['site'] = $this->get_site_info();
        $this->data['user'] = $this->get_user_info();
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

    public function get_user_info()
    {
        $output = $this->model->get_user_info();
        return $output;
    }

}
