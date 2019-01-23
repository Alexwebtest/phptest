<?php

namespace controllers;
use core\Controller;

class ErrorsController extends Controller {

    public function errorAction($code) {
        $data_array = array(
            'site_title' => $this->model->get_site_title(),
            'page_title' => 'Error '.$code,
        );

        $this->view->render($data_array);
    }

}