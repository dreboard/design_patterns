<?php
namespace Design_Patterns\ChainOfResponsibility;

/**
 * @package Design_Patterns\ChainOfResponsibility
 */
abstract class ITask {
    /**
     * @var object $successor
     */
    protected $successor;

    /**
     * @param TaskStatus $status
     * @return mixed
     */
    abstract public function check(TaskStatus $status);

    /**
     * @param ITask $successor
     */
    public function succeedWith(ITask $successor)
    {
        $this->successor = $successor;
    }

    /**
     * @param TaskStatus $status
     */
    public function next(TaskStatus $status)
    {
        if($this->successor){
            $this->successor->check($status);
        }
    }
}