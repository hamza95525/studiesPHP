<?php


namespace Config;


class Directory
{
    static private $root;

    static public function set($str){
        static::$root = str_replace('public','',$str);
       // echo static::$root;
    }

    static public function root(){
        return static::$root;
    }

    static public function storage(){
        return static::$root."storage";
    }

    static public function view(){
        return static::$root."view";
    }

    static public function src(){
        return static::$root."src";
    }
}