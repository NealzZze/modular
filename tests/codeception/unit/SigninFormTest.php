<?php
namespace tests\unit;

use app\models\SigninForm;
use Yii;

class SigninFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        Yii::$app->user->logout();
    }

    protected function _after()
    {
    }

    // tests
    public function testLoginNoUser()
    {
        $model = new SigninForm([
            'username' => 'not_existing_username',
            'password' => 'not_existed_password'
        ]);

        expect('model should not login user', $model->login())->false();
        expect('user should not be logged in', Yii::$app->user->isGuest)->true();
    }

    public function testLoginWrongPassword()
    {
        $model = new SigninForm([
            'username' => 'correct',
            'password' => 'wrong'
        ]);

        expect('model should not login user', $model->login())->false();
        expect('error message should be set', $model->errors)->hasKey('password');
        expect('user should not be logged in', Yii::$app->user->isGuest)->true();
    }

    public function testLoginWrongLogin()
    {
        $model = new SigninForm([
            'username' => 'wrong',
            'password' => 'correct'
        ]);

        expect('model should not login user', $model->login())->false();
        expect('error message should be set', $model->errors)->hasKey('password');
        expect('user should not be logged in', Yii::$app->user->isGuest)->true();
    }
}
