<?php

namespace Controller;

class UsersController extends Controller
{
    private $example_users = [
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

    public function index()
    {
        return ["users.index", ["users" => $this->example_users]];
    }

    public function show($id)
    {
        return ["users.show", ["user" => $this->example_users[$id]]];
    }
}
