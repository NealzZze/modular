<?php
namespace tests\acceptance;

use app\models\User;

class testCest
{
    public function _before(AcceptanceTester $I)
    {
        User::deleteAll();
        Yii::$app->db->createCommand()->insert(User::tableName(), [
            'username' => 'User',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'user@email.com',
        ])->execute();
    }

    // tests
    public function registrationtest(AcceptanceTester $I)
    {
        $I->wantTo('ensure that registration works');

        $I->amOnPage('/signup');

        $I->fillField('SignupForm[name]', 'Wrong value!_-+');
        $I->fillField('SignupForm[surname]', 'Wrong value!_-+');
        $I->fillField('SignupForm[username]', 'Wrong value!_-+');
        $I->fillField('SignupForm[email]', 'Wrong value!_-+');
        $I->fillField('SignupForm[password]', 'Wrong value!_-+');
        $I->fillField('SignupForm[password_repeat]', 'Wrong value!_-+');
        $I->click('Регистрация');
        $I->dontSee('Thank you for registration');

        $I->amOnPage('/signup');
        
        $I->fillField('SignupForm[name]', 'Somename_actest');
        $I->fillField('SignupForm[surname]', 'Somesurname_actest');
        $I->fillField('SignupForm[username]', 'Someusername_actest');
        $I->fillField('SignupForm[email]', 'some_actest@email.com');
        $I->fillField('SignupForm[password]', 'qwerty12');
        $I->fillField('SignupForm[password_repeat]', 'qwerty12');
        $I->click('Регистрация');
        $I->see('Thank you for registration');
    }

    public function logintest(AcceptanceTester $I)
    {
        $I->wantTo('ensure that log in works');

        $I->amOnPage('/signin');
        $I->fillField('SigninForm[username]', 'Someusername_actest');
        $I->fillField('SigninForm[password]', 'qwerty12');
        $I->click('signin-button');
        $I->see('Welcome back');
    }
}
