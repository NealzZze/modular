<?php
namespace Page;

class LoginPage
{
    
    public static $URL = '/signin';

    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \Tester;
     */
    protected $tester;

    public function __construct(\Tester $I)
    {
        $this->tester = $I;
    }

    public function login($username, $password)
    {
        $this->tester->fillfield('input[name"SigninForm[username]"]', $username);
        $this->tester->fillfield('input[name"SigninForm[password]"]', $password);
        $this->tester->click('submit-button');
    }
}
