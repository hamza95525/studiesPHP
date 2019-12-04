<?php


namespace Model;


use Concept\Distinguishable;

class User extends Distinguishable
{
    public $id;
    public $name;
    public $surname;
    public $email;
    public $password;
    public $password_confirmation;
    public $confirmed = false;
    public $token;

    public function id(){
        return $this->id;
    }

}