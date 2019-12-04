<?php


namespace Controller;


use Model\User;

class AuthController extends Controller
{
    public $db;

    public function register(){
        $flag = 1;
        if(isset($_POST['submitbutton'])) {

            $this->db =  $this->storage();

            if(empty($_POST['id'])) {
                echo "<li class='error'>The id filed cannot be empty</li>";
                $flag = 0;
            }
            else {
                $id = $_POST['id'];
                $user = new User($id);
                $user->id = $id;
            }

            if(empty($_POST['name'])){
                echo "<li class='error'>The name filed cannot be empty</li>";
                $flag = 0;
            }
            else {
                $name = $_POST['name'];
                $user->name = $name;
            }

            if(empty($_POST['surname'])) {
                echo "<li class='error'>The surname filed cannot be empty</li>";
                $flag = 0;
            }
            else {
                $surname = $_POST['surname'];
                $user->surname = $surname;
            }

            if(empty($_POST['email'])){
                echo "<li class='error'>The email filed cannot be empty</li>";
                $flag = 0;
            }
            else {
                $email = $_POST['email'];
                $user->email = $email;
                $user->token =  md5(uniqid(rand(), true));
            }

            if(empty($_POST['password'])) {
                echo "<li class='error'>The password filed cannot be empty</li>";
                $flag = 0;
            }
            else {
                $password = $_POST['password'];
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $user->password = $hash;
            }

            if(empty($_POST['password_confirmation'])){
                echo "<li class='error'>The password confirmation filed cannot be empty</li>";
                $flag = 0;
            }
            else {
                $password_confirmation = $_POST['password_confirmation'];
                $user->password_confirmation = $password_confirmation;
            }

            if($_POST['password'] != $_POST['password_confirmation']){
                echo "<li class='error'>The password confirmation filed does not match the password field</li>";
                $flag = 0;
            }

            if($flag == 1){
                $this->db->store($user);
                header('Location: /auth/confirmation_notice');
            }
        }

        return "auth.register.index";
    }

    public function confirmation_notice(){
        return "auth.confirmation_notice.index";
    }

    public function confirm($token){

        $this->db = $this->storage();
        $regUser = $this->db->loadAll();

        foreach($regUser as $user) {

            if ($user->token != $token) {

                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['error'] = "<li class='error'>Provided token is invalid!</li>";
                header('Location: /');

            } else if ($user->token == $token) {

                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['valid'] = "<li class='info'>Email successfully confirmed!</li>";
                $user->confirmed = true;
                $user->token = NULL;
                $this->db->store($user);
                header('Location: /');
            }
        }
    }

    //=================================================================================

    public function login(){
        $this->db = $this->storage();
        $regUser = $this->db->loadAll();

        if(isset($_POST['loginbutton'])){
            foreach ($regUser as $user) {
                if(isset($_POST['password']) && isset($_POST['email'])){
                    if( $_POST['email'] == $user->email && !password_verify( $_POST['password'], $user->password ) ){

                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }

                        $_SESSION['wrongpassword'] = "<li class='error'>Password is invalid!</li>";
                    }
                    else if($_POST['email'] == $user->email && password_verify( $_POST['password'], $user->password ) ){
                        if($user->confirmed) {
                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                            }
                            $_SESSION['login'] = serialize($user);
                            header('Location: /');
                        }
                        else
                            header('Location: /auth/confirmation_notice');
                    }
                    else{

                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }

                        $value = "Email '" .  $_POST['email'] . "' does not exist!";
                        $_SESSION['error'] = "<li class='error'>$value</li>";
                        header('Location: /');
                    }
                }

            }

            if(!$regUser) {
                session_start();
                $value = "Email '" . $_POST['email'] . "' does not exist!";
                $_SESSION['error'] = "<li class='error'>$value</li>";
                header('Location: /');
            }
        }

        return 'auth.login.index';
    }

    public function logout(){

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            unset($_SESSION['login']);
        }
        $_SESSION['loggedout'] = "Logged out successfully!";

        header('Location: /');
    }

}