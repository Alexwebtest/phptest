<?php

namespace lib;
use PDO;
use PDOException;
class db {

    protected $db;

    public function __construct() {
        $config = require 'config/db.php';
        try {
            $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'],$config['dbuser'],$config['pass']);
        } catch(PDOException $e) {
            echo 'Ошибка подключения: '.$e->getMessage();
            exit;
        }
    }

    public function query($sql,$params = []) {
        $stmt = $this->db->prepare($sql);
        if(!empty($params)){
            foreach ($params as $key => $value) {
                $stmt->bindValue(':'.$key,$value);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        /*
        $query = $this->db->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        */
    }

}