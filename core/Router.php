<?php

namespace core;

use controllers\ErrorsController;

class Router
{
    protected $routes = [];
    protected $params = [];

    /**
     * Router constructor.
     *
     * перебирает в цикле содержимое файла routes.php и добавляет в переменную $routes;
     *
     */
    function __construct()
    {
        $arr = require 'config/routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key,$value);
        }
    }

    /**
     * добавляет маршрут в переменнную protected $routes[];
     *
     * @param $route string - routes.php ключ
     * @param $params array - routes.php значение - контроллер и action
     *
     */
    function add($route,$params)
    {
        $route = '#^'.$route.'$#'; // # - разделитель, можно заменить на ~
        $this->routes[$route] = $params;
    }

    /**
     * проверяет, существует ли текущий url в routes.php
     * если да, добавляет контроллер и action в protected $params[]
     *
     * @return boolean;
     */
    private function match()
    {
        $url = trim($_SERVER['REQUEST_URI'],'/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route,$url,$matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     *  создаёт новый экземпляр контроллера и выполняет action
     */
    function run()
    {
        $error_route = [
            'controller' => 'errors',
            'action' => 'error'
        ];
        if ($this->match()) {
            $path = 'controllers\\'.ucfirst($this->params['controller']).'Controller';
            if(class_exists($path)) {
                $action = $this->params['action'].'Action';
                if(method_exists($path,$action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else { // если существует класс, но не существует метод
                    $controller = new ErrorsController($error_route);
                    $controller->errorAction(404);
                    //$controller = new $path($this->params);
                    //$controller->$action();
                }
            } else { // если не существует класс
                $controller = new ErrorsController($error_route);
                $controller->errorAction(404);
                /*
                $action = $this->params['action'].'Action';
                $controller = new $path($this->params);
                $controller->$action();
                */
            }
        } else { //если нет пути в routes[]
            $controller = new ErrorsController($error_route);
            $controller->errorAction(404);
        }
    }
}
