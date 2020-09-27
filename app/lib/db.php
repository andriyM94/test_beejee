<?php

namespace app\lib;
use PDO;

class Db
{
    protected $db;

    public function __construct(){
        $config = require 'app/config/db.php';
        // debug('mysql:host='.$config['host'].';dbname='.$config['dbname'].'');
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'', $config['user'], $config['pass']);
    }

    public function query($sql, $params=[]) {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)){
            foreach ($params as $key => $value) {
                $stmt->bindValue(':'.$key, $value);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params=[]) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function colum($sql, $params=[]) {
        $result = $this->query($sql, $params);
        return $result->fetchColum();
    }
}


?>