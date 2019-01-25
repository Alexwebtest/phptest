<?php

namespace controllers;

use core\Controller;

class AdminController extends Controller
{

    public $layout = 'admin';

    public function indexAction() {
        $this->data['title'] = 'Админка';
        $this->view->render($this->data);
    }

    public function optionsAction() {
        $this->data['title'] = 'Site options';
        $this->view->render($this->data);
    }


}
