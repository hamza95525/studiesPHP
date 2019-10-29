<?php


namespace Storage;


class SessionStorage implements Storage
{
    public function store($distinguishable)
    {
        // TODO: Implement store() method.
        $_SESSION[$distinguishable->key()] = serialize($distinguishable);
    }

    public function loadAll()
    {
        // TODO: Implement loadAll() method.
        $MyArray = array();
        foreach($_SESSION as $value){
            array_push($MyArray,unserialize($value));
        }

        return $MyArray;
    }
}