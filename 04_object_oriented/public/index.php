<?php

// Error reporting

error_reporting(-1);
ini_set("display_errors", "On");

// Autoload

require ("../autoload.php");

// App example

$app = new App();
$app->run();

// Example data

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
        'age' => 22
    ]
];

// Implementation

$parts = explode('/', $_SERVER['REQUEST_URI']);
array_shift($parts);

$page = $parts[0];

if ($page == "")
    $page = "home";

if ($page == "users")
    $users = $example_users;

if ($page == "user")
    $user = $example_users[$parts[1]];


$view = "../view/";
$file = $view . $page . ".php";

if (!file_exists($file))
    $file = $view . "404.php";

require($view . "layout.php");
