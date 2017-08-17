<?php
namespace Design_Patterns\ChainOfResponsibility;

/**
 * Class TaskThree
 * @package Design_Patterns\ChainOfResponsibility
 */
class TaskThree extends ITask{
    /**
     * @param TaskStatus $status
     * @return mixed|void
     * @throws \Exception
     */
    public function check(TaskStatus $status)
    {
        if(!$status->doThree){
            throw new \Exception("Task Three not performed");
        }
        $this->next($status);
    }
}