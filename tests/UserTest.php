<?php

use app\models\entities\Users;

class UserTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider providerUserConstructor
     */
    public function testUserConstructor($login, $pass)
    {
        $user = new Users($login, $pass);
        $this->assertEquals($login, $user->login);
        $this->assertEquals($pass, $user->pass);
        $this->assertEquals(false, $user->props['login']);
        $this->assertEquals(false, $user->props['pass']);
    }

    public function providerUserConstructor()
    {
        return [
            ["admin", 123],
            ["user1", 222],
            ["user2", 333],
        ];
    }
}