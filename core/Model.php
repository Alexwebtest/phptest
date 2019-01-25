<?php

namespace core;

use lib\db;

abstract class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new db;
    }

    public function get_site_info()
    {
        $output = [];
        $output['title'] = $this->get_site_title();
        $output['description'] = $this->get_site_description();
        $output['url'] = $this->get_site_url();
        return $output;
    }

    public function get_site_title()
    {
        $result = $this->db->query("SELECT value FROM options WHERE name = 'title'");
        if(!empty($result)) {
            $output = $result[0]['value'];
        } else {
            return false;
        }
        return $output;
    }

    public function get_site_description()
    {
        $result = $this->db->query("SELECT value FROM options WHERE name = 'description'");
        if(!empty($result)) {
            $output = $result[0]['value'];
        } else {
            return false;
        }
        return $output;
    }

    public function get_site_url()
    {
        return $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];
    }

    public function get_post($id)
    {
        $result = $this->db->query("SELECT * FROM posts WHERE ID = $id");
        if(!empty($result)) {
            $output = $result[0];
        } else {
            return false;
        }
        return $output;
    }

    public function get_template_name()
    {
        $result = $this->db->query("SELECT value FROM options WHERE name = 'template'");
        return $result;
    }

    public function get_user_info() {
        if(isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $result = $this->db->query("SELECT login FROM users WHERE ID = $userId");
            $userLogin = $result[0]["login"];
            return [
              'id' => $userId,
              'login' => $userLogin,
              'admin' => $userId == 1 ? true : false,
            ];
        } else {
            return false;
        }

    }



}
