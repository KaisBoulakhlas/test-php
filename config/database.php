<?php

require_once("constants.php");

class Database {

    private ?PDO $connection;

    public function getPDO() : ?PDO
    {
        try {
            $dsn = "mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            return $this->connection ?? $this->connection = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

?>