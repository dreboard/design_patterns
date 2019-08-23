<?php
use PHPUnit\Framework\TestCase;
use Design_Patterns\Decorator;


class FacadeTest extends TestCase
{
    /** @var string */
    protected $decorator;

    protected function setUp()
    {
        $string = "<p>Text with markup</p>";
        $this->decorator = new Design_Patterns\Decorator\BoldText(new Design_Patterns\Decorator\StripTagsText(new Design_Patterns\Decorator\PrintString($string)));
    }

    public function testLoginUserPlain()
    {
        $this->decorator->outputString();
        $this->expectOutputString("<p>Text with markup</p>");
    }
}