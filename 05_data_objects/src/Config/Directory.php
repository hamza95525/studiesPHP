<?php

namespace Config;

class Directory
{
    private static $root;

    public static function set($root)
    {
       // Directory::$root = $root;
        static::$root = str_replace('public','',$root);

    }

    public static function root()
    {
        return Directory::$root;
    }

    public static function storage()
    {
        return Directory::root() . "storage/";
    }

    public static function view()
    {
        return Directory::root() . "view/";
    }

    public static function src()
    {
        return Directory::root() . "src/";
    }
}