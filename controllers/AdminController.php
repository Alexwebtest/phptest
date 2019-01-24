<?php

namespace controllers;

use core\Controller;

class AdminController extends Controller
{

    public $layout = 'admin';

    public function indexAction() {
        $data_array = [
            'info' => $this->get_site_info(),
            'page_title' => 'Админка'
        ];
        $this->view->render($data_array);
    }

}
