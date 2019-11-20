<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('have comments page');

$I->amOnPage('/');

$I->click("Comments");

$I->seeCurrentUrlEquals('/comments');

$I->see('Comments', 'h2');

$I->seeLink("Create comment...", "/comments/create");

$I->click("Create comment...");

$I->dontSeeInDatabase("objects", ["key" => "model_comment_1"]);

$I->seeCurrentUrlEquals("/comments/create");
$I->see("Create comment", "h2");

$I->fillField("id", "1");
$I->fillField("text", "Dummy...");
$I->click("Create...");

$I->seeCurrentUrlEquals("/comments");
$I->seeInDatabase("objects", ["key" => "model_comment_1"]);

$I->see("Dummy...", "li");

$I->click("Dummy...");

$I->seeCurrentUrlEquals("/comments/1");

$I->see("Comment", "h2");
$I->see("Dummy...");

$I->click("Delete");

$I->seeCurrentUrlEquals("/comments");
$I->dontSee("Dummy...");
$I->dontSeeInDatabase("objects", ["key" => "model_comment_1"]);
