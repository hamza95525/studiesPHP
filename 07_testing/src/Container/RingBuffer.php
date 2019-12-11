<?php


namespace Container;


class RingBuffer
{
    private $RBuff = [];    //RingBuffer
    private $size = 0;     //size
    private $position = 0; //position where to insert
    private $head = 0;     //"youngest" added value
    private $tail = 0;     //"oldest" value

    public function __construct($num)
    {
        $this->RBuff = array_fill(0,$num,NULL); //in php we cant predefine the size of an array, so we create one filled with NULL's
    }

    public function empty(){
        //TODO
        for($i=0; $i<count($this->RBuff); $i++){
            if( $this->RBuff[$i] != NULL )
                return false;
        }

        return true; //if everything equals to NULL, then it means that its empty
    }

    public function capacity(){
        return count($this->RBuff);
    }

    public function size(){
        if($this->empty())
            return 0;
        else
            return $this -> size;
    }

    public function push($num){
        $this->RBuff[$this -> position] = $num;
        $this->head = $this->RBuff[$this->position];

        $this->position = ($this->position + 1) % $this->capacity();

        $this->size = min($this->size + 1, $this->capacity());
    }

    public function full(){
            return $this->size == $this->capacity(); //if size equals to capacity then it means that its full
    }

    public function pop(){
        $popResult = $this->tail();
        $this->RBuff[$this->tail] = NULL;
        $this->size--;

        return $popResult;
    }

    public  function tail(){
        $pos = $this->position - $this->size;
        $pos += $this->capacity();

        if($this->capacity() != 0)
            $this->tail = $pos % $this->capacity();

        return $this->RBuff[$this->tail];
    }

    public function head(){
        return $this->head;
    }

    public function at($num){
        return $this->RBuff[$num];
    }

}

