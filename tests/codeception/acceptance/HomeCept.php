<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that site works');

$I->amOnPage('/');
$I->seeLink('Home');
$I->seeLink('About');
$I->seeLink('Sign In');
$I->seeLink('Sign Up');
$I->see('Modular');

$I->click('Sign In');
$I->seeLink('Home');
$I->seeLink('About');
$I->seeLink('Sign In');
$I->seeLink('Sign Up');
$I->see('Modular');

$I->click('Sign Up');
$I->seeLink('Home');
$I->seeLink('About');
$I->seeLink('Sign In');
$I->seeLink('Sign Up');
$I->see('Modular');

$I->click('Modular');
$I->seeLink('Home');
$I->seeLink('About');
$I->seeLink('Sign In');
$I->seeLink('Sign Up');
$I->see('Modular');
