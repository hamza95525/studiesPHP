<?php

namespace Storage;

use Concept\Distinguishable;

interface Storage
{
    public function store(Distinguishable $distinguishable);
    public function loadAll() : array;
    public function load(string $pattern): array;
    public function remove(string $key);
}
