<?php

namespace Storage;

use Exception;

class StorageFactoryImpl implements StorageFactory
{
    /**
     * @param string $type
     * @return Storage
     * @throws Exception
     */
    public function create(string $type): Storage
    {
        $type = strtolower($type);

        if ($type == "mysql")
            return new MySQLStorage();

        if ($type == "sqlite")
            return new SQLiteStorage();

        if ($type == "file")
            return new FileStorage();

        if ($type == "session")
            return new SessionStorage();

        if ($type == "redis")
            return new RedisStorage();

        throw new Exception("Unknown storage type: ${type}");
    }
}