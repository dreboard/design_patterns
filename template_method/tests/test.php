<?php
use PHPUnit\Framework\TestCase;
use Design_Patterns\TemplateMethod;


class TemplateTest extends TestCase
{
    /** @var string */
    protected $app;

    protected function setUp()
    {

    }

    /**
     *
     */
    public function testTemplateMethod()
    {
        $this->assertEquals('1', '1');
    }
}