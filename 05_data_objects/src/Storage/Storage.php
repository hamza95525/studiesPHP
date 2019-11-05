<?php

namespace Storage;

use Concept\Distinguishable;

interface Storage
{
    public function store(Distinguishable $distinguishable);
    public function loadAll() : array;
}
