<?php
namespace Design_Patterns\ChainOfResponsibility;

/**
 * Class TaskOne
 * @package Design_Patterns\ChainOfResponsibility
 */
class TaskOne extends ITask{
    /**
     * @param TaskStatus $status
     * @return mixed|void
     * @throws \Exception
     */
    public function check(TaskStatus $status)
    {
        if(!$status->doOne){
            throw new \Exception("Task One not performed");
        }
        $this->next($status);
    }
}