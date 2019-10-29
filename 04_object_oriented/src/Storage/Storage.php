<?php


namespace Storage;


use Concept\Distinguishable;

interface Storage
{
    public function store($distinguishable);
    public function loadAll();
}