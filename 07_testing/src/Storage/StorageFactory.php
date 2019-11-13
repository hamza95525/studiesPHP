<?php

namespace Storage;

use Exception;

interface StorageFactory
{
    /**
     * @param string $type
     * @return Storage
     * @throws Exception
     */
    public function create(string $type) : Storage;
}