<?php


namespace Concept;

abstract class Distinguishable
{
    private $id = 1;

    function __construct()
    {
        static $id1 = 1;
        $this->id = $id1++;
    }

    public function key(){
        $str = static::class;
        $str = $this->normalize($str);
        return $str . "_" . $this->id;
    }

    private function normalize($str){
        return str_replace('\\','_',$str);
    }
}