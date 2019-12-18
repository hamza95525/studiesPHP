<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('see comments from DB displayed on page');

$id = $I->haveInDatabase('comments', ['title' => 'New', 'text' => 'Some text']);

$I->amOnPage('/comments');
$I->seeLink("New", "/comments/$id");

$I->click("New");
$I->seeCurrentUrlEquals("/comments/$id");

$I->see('New', 'div.card-header');
$I->see('Some text', 'div.card-body');
