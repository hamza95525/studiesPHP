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
       try{
            if($this->pdo==null){
                $path = Directory::storage() . "db.sqlite";
                $dsn = "sqlite:" . $path;
                $this->pdo = new PDO($dsn);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->exec("CREATE TABLE IF NOT EXISTS tables( id VARCHAR[30] PRIMARY KEY, data TEXT NOT NULL);" );
            }
            return $this->pdo;

        } catch(PDOException $e){
            logerror($e->getMessage(), "opendatabase");
            print "Error in open ".$e->getMessage();
        }
    }

    public function store(Distinguishable $distinguishable)
    {
        $id = $distinguishable->key();
        $serializedData = serialize($distinguishable);

        $statement = $this->pdo->prepare("INSERT OR REPLACE INTO tables VALUES (:id, :data);");
        $statement->bindValue('id', $id);
        $statement->bindValue('data', $serializedData);
        $statement->execute();

    }

    public function loadAll() : array
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