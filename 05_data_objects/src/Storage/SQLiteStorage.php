<?php

namespace Storage;

use Concept\Distinguishable;
use PDO;
use Config\Directory;

class SQLiteStorage implements Storage
{
    private $pdo;

    public function __construct()
    {
        // TODO: ...
        $path = Directory::storage() . "db.sqlite";
        $dsn = "sqlite:" . $path;
        $this->pdo = new PDO($dsn);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function store(Distinguishable $distinguishable)
    {
        // TODO: ...
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS myTable (id INTEGER PRIMARY KEY, data TEXT NOT NULL)" );
        $id = 1;
        $name = serialize($distinguishable);
        $sql = 'INSERT INTO myTable VALUES ($id, $name)';
        $this->pdo->prepare($sql);
       // $stmt->bindValue(':Haj', $distinguishable->key());
        $this->pdo->execute();

    }

    public function loadAll()
    {
        $MyArray = array();

        $statement = $this->pdo->prepare('SELECT * FROM myTable');
        $objects = $statement->fetchAll();

        print_r($objects);

       /* foreach($objects as $object){
            $MyArray += unserialize($object);
        }*/

        $MyArray = $statement->execute();
        return $MyArray; // TODO: ...
    }
}