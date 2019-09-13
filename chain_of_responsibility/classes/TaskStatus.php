<?php
namespace Design_Patterns\ChainOfResponsibility;

/**
 * Class TaskStatus
 * @package Design_Patterns\ChainOfResponsibility
 */
class TaskStatus
{
    /**
     * @var bool
     */
    public $doOne = true;
    /**
     * @var bool
     */
    public $doTwo = true;
    /**
     * @var bool
     */
    public $doThree = true;

    /**
     * Set the initial task
     * @param $task
     * @param $value
     */
    public function setTask($task, $value)
    {
        $this->task = $value;
    }
}