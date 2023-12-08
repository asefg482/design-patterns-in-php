<?php

class DataBaseConnection
{
    private static ?DataBaseConnection $instance = null;
    private ?PDO $connection;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=test_db", 'root', '');
    }

    public static function getInstance(): DataBaseConnection
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
            return self::$instance;
        } else {
            return self::$instance;
        }
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}

$dbcon = DataBaseConnection::getInstance();
var_dump($dbcon->getConnection());

$dbcon1 = DataBaseConnection::getInstance();
var_dump($dbcon1->getConnection());