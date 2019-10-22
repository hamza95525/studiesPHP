<?php

error_reporting(-1);
ini_set("display_errors", "On");

$example_users = [
    1 => [
        'name' => 'John',
        'surname' => 'Doe',
        'age' => 21
    ],
    2 => [
        'name' => 'Peter',
        'surname' => 'Bauer',
        'age' => 16
    ],
    3 => [
        'name' => 'Paul',
        'surname' => 'Moustache',
        'age' => 18
    ]
];

$uri = $_SERVER['REQUEST_URI'];
$i = substr($uri, strrpos($uri, '/') + 1); #return number at the end of URL in case of user/{INT},
                                                        #and in user.php to chose the right person

if($uri == '/'){
    $file = "../views/home.php";
}
elseif($uri == "/user/$i"){
    $file = "../views/user.php";
}
else
    $file = "../views/" . $uri . ".php";

require_once("../views/layout.php");

?>