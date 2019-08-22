<?php
namespace Design_Patterns\ChainOfResponsibility;

/**
 * Class TaskTwo
 * @package Design_Patterns\ChainOfResponsibility
 */
class TaskTwo extends ITask{
    /**
     * @param TaskStatus $status
     * @return mixed|void
     * @throws \Exception
     */
    public function check(TaskStatus $status)
    {
        if(!$status->doTwo){
            throw new \Exception("Task Two not performed");
        }
        $this->next($status);
    }
}