<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('see Laravel links on homepage');

$I->amOnPage('/');

$I->see('Laravel', 'div.title');

$I->seeLink("DOCS", "https://laravel.com/docs");
$I->seeLink("LARACASTS", "https://laracasts.com/");
$I->seeLink("NEWS", "https://laravel-news.com/");
$I->seeLink("BLOG", "https://blog.laravel.com/");
$I->seeLink("NOVA", "https://nova.laravel.com/");
$I->seeLink("FORGE", "https://forge.laravel.com/");
$I->seeLink("VAPOR", "https://vapor.laravel.com/");
$I->seeLink("GITHUB", "https://github.com/laravel/laravel");

