<?php

use JetBrains\PhpStorm\Pure;

class Connection
{
}

class TestConnection
{
    private static ?TestConnection $testConnection = null;
    private ?Connection $connection = null;

    #[Pure] public function __construct()
    {
        $this->connection = new Connection();
    }

    public static function getInstance(): TestConnection
    {
        if (is_null(self::$testConnection)) {
            self::$testConnection = new self();
        }
        return self::$testConnection;
    }

    public function getConnection()
    {
        return $this->getConnection();
    }
}


$c = TestConnection::getInstance();
$c->getConnection();