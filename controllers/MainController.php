<?php

namespace controllers;

use core\Controller;

class MainController extends Controller
{


    public function indexAction()
    {

        $main_page = $this->model->get_post(1);
        $this->data['title'] = $main_page['title'];
        $this->data['content'] = $main_page['content'];

        $this->data['allPosts'] = $this->model->getAllPosts();

        $this->view->render($this->data);
    }
}
