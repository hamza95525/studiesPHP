<?php

use Widget\Link;

$I = new AcceptanceTester($scenario);
$I->wantTo('see welcome message on homepage');

$I->amOnPage("/");
$I->see('Welcome on homepage!');

$I->click('Demo');
$I->seeCurrentUrlEquals('/demo');

$I->dontSeeInDatabase('objects', ['key' => 'widget_link_1']);

$I->click('MySQL');
$I->seeCurrentUrlEquals('/demo/mysql');

$I->seeInDatabase('objects', ['key' => 'widget_link_1']);

$data = $I->grabFromDatabase('objects', 'data', ['key' => 'widget_link_1']);

$link = unserialize($data);

$I->assertEquals('widget_link_1', $link->key());

$link = new Link(99);

$I->amOnPage('/demo');

$I->haveInDatabase('objects', ['key' => $link->key(), 'data' => serialize($link)]);

$I->click('MySQL');
$I->seeCurrentUrlEquals('/demo/mysql');

$I->see($link->key());
