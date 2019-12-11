<?php


namespace String;


class Editor
{
    public $string;

    public function __construct($str){
        $this->string = $str;
    }

    public function get(){
        return $this->string;
    }

    public function replace($search, $replaceWith){
       $this->string = str_replace($search, $replaceWith, $this->string); //when i tried just to call str_replace, it didnt work
        return $this;
    }

    public function lower(){
        $this->string = strtolower($this->string);
        return $this;
    }

    public function upper(){
        $this->string = strtoupper($this->string);
        return $this;
    }

    public function censor($str){
        $this->replace($str, str_repeat("*", strlen($str)));
        return $this;
    }

    public function repeat($str, $num){
        $this->replace($str, str_repeat( $str, $num));
        return $this;
    }

    public function remove($str){
        $this->replace($str, '');
        return $this;
    }
}