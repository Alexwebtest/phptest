<?php

namespace controllers;

use core\Controller;

class ErrorsController extends Controller
{

    public function errorAction($code)
    {
        $data_array = array(
            'info' => $this->get_site_info(),
            'page_title' => 'Error '.$code,
        );

        $this->view->render($data_array);
    }
}
