<?php

namespace models;

use core\Model;

class MainModel extends Model
{
    public function getAllPosts()
    {
        return $this->db->query("SELECT * FROM posts");
    }
}
