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
    }

    public function store(Distinguishable $distinguishable)
    {
        // TODO: ...
    }

    public function loadAll(): array
    {
        return []; // TODO: ...
    }
}