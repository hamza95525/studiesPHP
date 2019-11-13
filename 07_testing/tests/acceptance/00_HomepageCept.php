<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('see welcome message on homepage');

$I->amOnPage("/");
$I->seeInTitle("Homepage");
$I->see('Welcome!', 'h1.welcome');

$I->wantTo("have empty database when visiting homepage");
$I->seeNumRecords(0, "objects");

$I->wantTo("use homepage link");
$I->click("Home");
$I->seeCurrentUrlEquals("/home");
$I->seeInTitle("Homepage");
$I->see('Welcome!', 'h1.welcome');

$I->wantTo("see login and register links");
$I->seeLink("Login", "/auth/login");
$I->seeLink("Register", "/auth/register");
