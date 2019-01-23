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
        $output['site_title'] = $this->get_site_title();
        $output['site_description'] = $this->get_site_description();
        $output['site_url'] = $this->get_site_url();
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
        $result = $this->db->query("SELECT * FROM posts where ID = $id");
        if(!empty($result)) {
            $output = $result[0];
        } else {
            return false;
        }
        return $output;
    }

    public function get_template_name()
    {
        $result = $this->db->query("SELECT value FROM options where name = 'template'");
        return $result;
    }
}
