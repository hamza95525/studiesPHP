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
        return $this->load('*');
    }

    public function load(string $pattern): array
    {
        $result = [];
        foreach ($_SESSION as $key => $value) {
            if (fnmatch($pattern, $key)) {
                $result[] = unserialize($value);
            }
        }
        return $result;
    }

    public function remove(string $key)
    {
        unset($_SESSION[$key]);
    }
}