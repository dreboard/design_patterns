<?php
use PHPUnit\Framework\TestCase;
use Design_Patterns\TemplateMethod;


class TemplateTest extends TestCase
{
    /** @var string */
    protected $app;

    /**
     * PHPUnit setup
     * Initiate classes to be tested
     */
    protected function setUp()
    {

    }

    /**
     * Test placeholder
     * @todo Implement template method test
     */
    public function testTemplateMethod()
    {
        $this->assertEquals('1', '1');
    }
}