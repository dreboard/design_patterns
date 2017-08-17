<?php
namespace Design_Patterns\ChainOfResponsibility;

/**
 * Class TaskStatus
 * @package Design_Patterns\ChainOfResponsibility
 */
class TaskStatus
{
    public $doOne = true;
    public $doTwo = true;
    public $doThree = true;

    public function setTask($task, $value)
    {
        $this->$task = $value;
    }
}