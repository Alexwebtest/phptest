<?php

namespace models;

use core\Model;

class UserModel extends Model
{
    public function addNewUser($login, $password)
    {
        $user_exists = $this->isUserExists($login);
        if ($user_exists) {
            return false;
        } else {
            $password = md5($password);
            $result = $this->db->query("INSERT INTO `users` (login, password) VALUES ('$login', '$password')");
            return true;
        }
    }

    public function isUserExists($login)
    {
        $result = $this->db->query("SELECT * FROM `users` WHERE login = '$login'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function loginUser($login, $password)
    {
        $password = md5($password);
        $result = $this->db->query("SELECT `ID` FROM `users` WHERE login = '$login' AND password = '$password'");
        if(empty($result)){
            return false;
        } else {
            return $result[0]["ID"];
        }
    }
}
