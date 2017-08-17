<?php
namespace Design_Patterns\ChainOfResponsibility;

use PHPUnit\Framework\TestCase;
use Design_Patterns\ChainOfResponsibility\{TaskOne, TaskTwo, TaskThree, TaskStatus};
use Exception;

class ChainOfResponsibilityTest extends TestCase
{
    protected $taskOne;
    protected $taskTwo;
    protected $taskThree;
    protected $taskStatus;

    protected function setUp()
    {
        $this->taskOne = new TaskOne();
        $this->taskTwo = new TaskTwo();
        $this->taskThree = new TaskThree();
        $this->taskStatus = new TaskStatus();

    }


    public function testTaskOneFails()
    {
        try {
            $this->taskStatus->setTask('doOne', false);
            //var_dump($this->taskStatus);die;
            $this->taskOne->succeedWith($this->taskTwo);
            //$this->taskTwo->succeedWith($this->taskThree);
            $this->expectOutputString("");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }




}
