<?php

namespace controllers;

use core\Controller;

class AccountController extends Controller
{

    public function loginAction()
    {
        $this->data['title'] = 'Авторизация';
        $this->view->render($this->data);
    }

    public function registerAction()
    {

        $this->data['title'] = 'Регистрация';
        $this->view->render($this->data);
    }
}
