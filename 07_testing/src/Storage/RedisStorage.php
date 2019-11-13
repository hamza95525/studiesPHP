<?php

namespace Storage;

use Concept\Distinguishable;
use Predis\Client;

class RedisStorage implements Storage
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function store(Distinguishable $distinguishable)
    {
        $this->client->set($distinguishable->key(), serialize($distinguishable));
    }

    public function loadAll(): array
    {
        return $this->load('*');
    }

    public function load(string $pattern): array
    {
        $keys = $this->client->keys($pattern);
        $objects = $this->client->mget($keys);

        $result = [];

        foreach ($objects as $object) {
            $result[] = unserialize($object);
        }

        return $result;
    }

    public function remove(string $key)
    {
        $this->client->del([$key]);
    }
}