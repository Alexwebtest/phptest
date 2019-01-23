<?php

namespace controllers;
use core\Controller;

class NewsController extends Controller {

    public function singleAction($id) {
        $news_page = $this->model->get_post($id);
        $data_array = [
            'info' => $this->get_site_info(),
            'post_title' => $news_page['title'],
            'post_content' => $news_page['content'],
        ];
        $this->view->render($data_array);
    }

    public function listAction() {
        echo 'all news list page';
    }

}