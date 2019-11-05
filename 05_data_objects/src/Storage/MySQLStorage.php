<?php

namespace Storage;

use Concept\Distinguishable;
use PDO;

class MySQLStorage implements Storage
{
    private $pdo;

    public function __construct()
    {
        // TODO: ...
        $dsn = "mysql:host=localhost;dbname=test";
        $username = "test";
        $password = "test123";

        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS tables (`id` VARCHAR(30) PRIMARY KEY, `data` TEXT)");
    }

    public function store(Distinguishable $distinguishable)
    {
        // TODO: ...
        $id = $distinguishable->key();
        $serializedData = serialize($distinguishable);

        $statement = $this->pdo->prepare("INSERT OR REPLACE INTO tables VALUES (:id, :data);");
        $statement->bindValue('id', $id);
        $statement->bindValue('data', $serializedData);
        $statement->execute();

    }

    public function loadAll(): array
    {
        $MyArray = array();

        $query = $this->pdo->query("SELECT * FROM tables");
        $rows = $query->fetchAll(PDO::FETCH_COLUMN,1);

        foreach($rows as $value){
            array_push($MyArray, unserialize($value));
        }

        return $MyArray; // TODO: ...
    }
}