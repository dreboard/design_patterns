<?php
use PHPUnit\Framework\TestCase;
use Design_Patterns\TemplateMethod;


class TemplateTest extends TestCase
{
    /** @var string */
    protected $app;

    protected function setUp()
    {
        $this->app = new Design_Patterns\TemplateMethod\App();
    }

    /**
     *
     */
    public function testMailLogger()
    {
        $this->assertNull($this->app->logit('Some data', new Design_Patterns\Strategy\EmailLogger()));
    }

    /**
     *
     */
    public function testFileLogger()
    {
        $this->assertNull($this->app->logit('Some data', new Design_Patterns\Strategy\FileILogger()));
    }
}