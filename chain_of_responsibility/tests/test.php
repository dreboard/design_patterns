<?php

namespace Design_Patterns\ChainOfResponsibility;

use PHPUnit\Framework\TestCase;
use Design_Patterns\ChainOfResponsibility\{
    TaskOne, TaskTwo, TaskThree, TaskStatus
};
use Exception;

class ChainOfResponsibilityTest extends TestCase
{
    protected $taskOne;
    protected $taskTwo;
    protected $taskThree;
    protected $taskStatus;

    /**
     * PHPUnit setup
     * Initiate classes to be tested
     */
    protected function setUp()
    {
        $this->taskOne = new TaskOne();
        $this->taskTwo = new TaskTwo();
        $this->taskThree = new TaskThree();
        $this->taskStatus = new TaskStatus();

    }

    /**
     * TaskStatus Testing
     * Test that task one failes
     */
    public function testTaskOneFails()
    {
        try {
            //var_dump($this->taskStatus);die;
            $this->assertEquals('Task One not performed', $this->taskOne->check($this->taskStatus));
            //$this->taskOne->check($this->taskStatus);
            //$this->taskTwo->succeedWith($this->taskThree);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * TaskStatus Testing
     * Test that task one succeeds
     */
    public function testTaskOnePasses()
    {
        try {
            $this->taskStatus->setTask('doOne', false);
            $this->taskOne->succeedWith($this->taskTwo);
            $this->expectOutputString("");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


}
