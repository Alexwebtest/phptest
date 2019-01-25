<?php

namespace controllers;

use core\Controller;

class ErrorsController extends Controller
{

    public function errorAction($code)
    {
        $this->data['title'] = 'Error '.$code;
        $this->view->render($this->data);
    }
}
