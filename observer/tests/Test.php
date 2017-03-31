<?php
namespace Design_Patterns\Observer;

use PHPUnit\Framework\TestCase;
use Design_Patterns\Observer;

class ObserverTest extends TestCase
{
    protected $login;
    protected function setUp()
    {
        $this->login = new Login();
    }

    public function testLoginUserPlain()
    {
        $this->login->loginUser();
        $this->expectOutputString("");
    }

    public function testLoginUser()
    {
        $this->login->attach([
            new LogHandler(),
            new UserCredentials(),
            new LogThrottle()
        ]);
        $this->expectOutputString("Log users ip, date.return session data.Count unsuccessful attempts.");
    }


}
