<?php

namespace Storage;

use Concept\Distinguishable;

class SessionStorage implements Storage
{
    public function __construct()
    {
        session_start();
    }

    public function store(Distinguishable $distinguishable)
    {
        $key = $distinguishable->key();
        $_SESSION[$key] = serialize($distinguishable);
    }

    public function loadAll(): array
    {
        $result = [];
        foreach ($_SESSION as $key => $value) {
            $result[] = unserialize($value);
        }

        print_r($result);
        return $result;
    }
}