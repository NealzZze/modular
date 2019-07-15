<?php
namespace tests\unit;

use app\models\SignupForm;
use Yii;

class SignupFormTest extends \Codeception\Test\Unit
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
    public function testSignupEmptyValues()
    {
        $model = new SignupForm([
            'username' => '',
            'name' => '',
            'surname' => '',
            'email' => '',
            'password' => '',
            'password_repeat' => '',
        ]);

        expect('model should not signup user', $model->validate())->false();
        expect('user should not be logged in', Yii::$app->user->isGuest)->true();
    }

    public function testSignupWrongValues()
    {
        $model = new SignupForm([
            'username' => '__!#@# ??"!% ',
            'name' => '__!#@# ??"!% ',
            'surname' => '__!#@# ??"!% ',
            'email' => 'wrong@email with spaces.com',
            'password' => '__!#@# ??"!% ',
            'password_repeat' => '__!#@# ??"!% ',
        ]);

        expect('model should not signup user', $model->validate())->false();
        expect('user should not be logged in', Yii::$app->user->isGuest)->true();
    }

    public function testSignupPasswordsNotMatch()
    {
        $model = new SignupForm([
            'username' => 'Normal',
            'name' => 'Normal',
            'surname' => 'Normal',
            'email' => 'normal@email.com',
            'password' => 'password1',
            'password_repeat' => 'password2',
        ]);

        expect('model should not signup user', $model->validate())->false();
        expect('user should not be logged in', Yii::$app->user->isGuest)->true();
    }


}