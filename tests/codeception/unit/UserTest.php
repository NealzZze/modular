<?php

namespace tests\unit;

use app\models\User;
use \Codeception\Specify;
use Codeception\TestCase\Test;
use Yii;

class UserTest extends Test
{
    use Specify;

    protected $tester;
    protected $user;

    public function _before()
    {
        User::deleteAll();
        Yii::$app->db->createCommand()->insert(User::tableName(), [
            'username' => 'User',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'user@email.com',
        ])->execute();

        $this->user = new User();
    }

    public function testValidation()
    {
        $this->specify('fields are empty', function () {
            $this->user->username = null;
            $this->user->name = null;
            $this->user->surname = null;
            $this->user->email = null;
            expect('model is not valid', $this->user->validate())->false();
            expect('username has error', $this->user->getErrors())->hasKey('username');
            expect('name has error', $this->user->getErrors())->hasKey('name');
            expect('surname has error', $this->user->getErrors())->hasKey('surname');
            expect('email has error', $this->user->getErrors())->hasKey('email');
        });

        $this->specify('fields are wrong', function () {
            $this->user->username = 'Wrong %!=-+_ Username';
            $this->user->name = 'wrong%!= -+_name';
            $this->user->surname = 'wrong%!= -+_surname';
            $this->user->email = 'wrong%!=-+_email';
            expect('model is not valid', $this->user->validate())->false();
            expect('username has error', $this->user->getErrors())->hasKey('username');
            expect('name has error', $this->user->getErrors())->hasKey('name');
            expect('surname has error', $this->user->getErrors())->hasKey('surname');
            expect('email has error', $this->user->getErrors())->hasKey('email');
        });

        $this->specify('fields are unique', function () {
            $this->user->username = 'User';
            $this->user->name = 'Name';
            $this->user->surname = 'Surname';
            $this->user->email = 'user@email.com';
            expect('model is not valid', $this->user->validate())->false();
            expect('username has error', $this->user->getErrors())->hasKey('username');
            expect('email has error', $this->user->getErrors())->hasKey('email');
        });

        $this->specify('fields are correct', function () {
            $this->user->username = 'Username';
            $this->user->name = 'Name';
            $this->user->surname = 'Surname';
            $this->user->email = 'username@email.com';
            expect('model is not valid', $this->user->validate())->true();
        });
    }

    public function testSaveIntoDatabase()
    {
        $user = new User([
            'username' => 'TestUsername',
            'name' => 'testname',
            'surname' => 'testsurname',
            'email' => 'test@email.com',
        ]);

        expect('model is not valid', $user->save())->true();

        $this->tester->seeInDatabase('users', [
            'username' => 'TestUsername',
            'name' => 'testname',
            'surname' => 'testsurname',
            'email' => 'test@email.com',
        ]);
    }
}
