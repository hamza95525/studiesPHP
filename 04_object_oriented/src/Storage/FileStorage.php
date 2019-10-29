<?php


namespace Storage;


use Config\Directory;

class FileStorage implements Storage
{
    public function store($distinguishable)
    {
        // TODO: Implement store() method.
        $temp = new Directory();
        $location = $temp::storage();
        $ffile = fopen($location.'/'.$distinguishable->key(), "c");
        fwrite( $ffile, serialize( $distinguishable ) );
    }

    public function loadAll()
    {
        // TODO: Implement loadAll() method.
        $MyArray = array();
        $temp = new Directory();
        $location = $temp::storage();
        $files = scandir($location);
        rsort($files);
        natsort($files);

        foreach($files as $file){
            if ( ($file == '.') || ($file == '..') || ($file == '.gitignore')){
                continue;
            }
            array_push($MyArray,unserialize(file_get_contents(__DIR__ . '/../../storage/' . $file) ) );
        }

        return $MyArray;
    }
}