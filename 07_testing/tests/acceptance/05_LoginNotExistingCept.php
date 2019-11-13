<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('see error when user does not exists');

$I->amOnPage("/auth/login");

$I->seeInTitle("Login");
$I->see("Login", "h2");

$I->fillField("email", "foo@bar.com");
$I->fillField("password", "foo");

$I->click("Enter");

$I->seeCurrentUrlEquals("/");
$I->see("Email 'foo@bar.com' does not exist!", "li.error");
