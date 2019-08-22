<?php

namespace Design_Patterns\Singleton;

use PHPUnit\Framework\TestCase;
use Design_Patterns\Singleton\{
    Singleton, SingletonChild
};
use Exception;

class SingletonTest extends TestCase
{
    /** @var string */
    protected $obj;

    /** @var string */
    protected $childObj;

    /**
     * PHPUnit setup
     * Initiate classes to be tested
     */
    protected function setUp()
    {
        $obj = Singleton::getInstance();
        $childObj = SingletonChild::getInstance();

    }

    /**
     * Singleton Testing
     * Test that task one failes
     */
    public function testOnlyOneInstance()
    {
        try {
            $this->assertEquals($this->obj, Singleton::getInstance());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * SingletonChild Testing
     * Test that task one succeeds
     */
    public function testOnlyOneChildInstance()
    {
        try {
            $this->assertEquals($this->childObj, SingletonChild::getInstance());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


}