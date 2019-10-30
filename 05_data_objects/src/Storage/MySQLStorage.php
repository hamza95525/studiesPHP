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