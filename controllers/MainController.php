<?php

namespace controllers;
use core\Controller;

class MainController extends Controller {

    public function indexAction() {
        $main_page = $this->model->get_post(1);
        $data_array = array(
            'info' => $this->get_site_info(),
            'page_title' => $main_page['title'],
            'post_content' => $main_page['content'],
            'allPosts' => $this->model->getAllPosts()
        );

        $this->view->render($data_array);
    }

}