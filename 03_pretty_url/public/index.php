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
        'surname' => 'Smith',
        'age' => 18
    ]
];

$uri = $_SERVER['REQUEST_URI'];

if($uri == '/'){
    $file = "../views/home.php";
}
else if($uri == "user.php?id=1"){
        $file = "../views/user.php";
}
else
    $file = "../views/" . $uri . ".php";



require_once($file);

?>