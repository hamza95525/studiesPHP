<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Config\Directory;

class Log
{
    /**
     * @var Monolog\Logger
     */
    private static $log;

    public static function init()
    {
        $path = Directory::storage() . "app.log";

        self::$log = new Logger('app');
        self::$log->pushHandler(new StreamHandler($path, Logger::DEBUG));
    }

    public static function debug(string $message)
    {
        self::$log->debug($message);
    }

    public static function info(string $message)
    {
        self::$log->info($message);
    }

    public static function warning(string $message)
    {
        self::$log->warning($message);
    }

    public static function error(string $message)
    {
        self::$log->error($message);
    }
}