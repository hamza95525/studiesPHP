<?php

namespace Storage;

use Concept\Distinguishable;

class RedisStorage implements Storage
{
    private $client;
    public function __construct()
    {
        $this->client = new \Predis\Client();
    }

    public function store(Distinguishable $distinguishable)
    {
        //predis example
        $this->client->set($distinguishable->key(), serialize($distinguishable));
        //$value = $this->client->get($distinguishable->key());
    }

    public function loadAll(): array
    {
        $MyArray = array();
        $value = $this->client->keys('*');

        foreach ($value as $item) {
            array_push($MyArray, unserialize($this->client->get($item)));
        }
        
        return $MyArray;
    }
}