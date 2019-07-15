<?php
namespace Page;

class SignunPage
{
    
    public static $URL = '/signup';

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

}
