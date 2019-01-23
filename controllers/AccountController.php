<?php

namespace controllers;
use core\Controller;

class AccountController extends Controller {

    public function loginAction() {
        $data_array = [
            'info' => $this->get_site_info(),
            'page_title' => 'Авторизация'
        ];
        $this->view->render($data_array);
    }

    public function registerAction() {
        $data_array = [
            'info' => $this->get_site_info(),
            'page_title' => 'Регистрация',
        ];
        $this->view->render($data_array);
    }

}