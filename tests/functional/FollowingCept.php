<?php 
$I = new FunctionalTester($scenario);

$I->am('a Larabook user.');
$I->wantTo('follow other Larabook users');

//setup
$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();

//action

$I->click('Browse Users');
$I->click('OtherUser');

// When I follow a user
$I->seeCurrentUrlEquals('/@OtherUser');
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

$I->see('Unfollow OtherUser');

// When I unfollow a user
$I->click('Unfollow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Follow OtherUser');



