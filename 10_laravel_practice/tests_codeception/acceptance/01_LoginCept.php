<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('login with existing user');

$I->amOnPage('/home');

$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');

$I->click('#login_button');

$I->seeCurrentUrlEquals('/home');

$I->see('You are logged in!', 'div.card-body');

