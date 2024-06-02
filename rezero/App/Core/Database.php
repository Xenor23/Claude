<?php

namespace App\Core;

use PDO;

class Database extends PDO{
    private $dsn;
    private $username;
    private $password;
    private $options;
    public function __construct()
    {
        $dsn="mysql:host=172.18.0.101;dbname=rezero;charset=utf8;port=3306";
        $username="root";
        $password="M.Duy13";
        $options=[];
        parent::__construct($dsn, $username, $password, $options);
    }
}