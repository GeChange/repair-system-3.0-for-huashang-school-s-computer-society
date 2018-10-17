<?php
/**
 * Created by PhpStorm.
 * User: vicent
 * Date: 2017/12/3
 * Time: 21:42
 */

namespace App\Services;


use Clarkeash\Doorman\Doorman;

class TestService
{
    protected $doorman;
    public function __construct(Doorman $doorman)
    {
        $this->doorman = $doorman;
    }

    public function test()
    {
        $this->doorman->generate()->times(300)->make();
        return  redirect('/inviteController/finish');
    }
}