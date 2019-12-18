<?php

// Home
Breadcrumbs::for('books.index', function ($trail) {
    $trail->push('books', route('books.index'));
});

// Home
Breadcrumbs::for('books.create', function ($trail) {
    $trail->push('books/create', route('books.create'));
});

Breadcrumbs::for('books.show', function ($trail, $book) {
    $trail->push('books/' . $book->title, route('books.show', $book ?? "") );
});

Breadcrumbs::for('books.edit', function ($trail, $book) {
    $trail->push('books/edit/' . $book->title, route('books.show', $book ?? "") );
});


//===================================================================================



Breadcrumbs::for('comments.index', function ($trail) {
    $trail->push('comments', route('comments.index'));
});

Breadcrumbs::for('comments.show', function ($trail, $comment) {
    $trail->push('comments/' . $comment->title, route('comments.index', $comment ?? ""));
});

//====================================================================================

Breadcrumbs::for('posts.index', function ($trail) {
    $trail->push('posts', route('posts.index'));
});
 //=====================================================================================

Breadcrumbs::for('home', function ($trail) {
    $trail->push('home', route('home'));
});

//========================================================================================

Breadcrumbs::for('login', function ($trail) {
    $trail->push('login', route('login'));
});
