<?php
namespace Design_Patterns\ChainOfResponsibility;
require_once "../vendor/autoload.php";

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

/**
 * Class TaskStatus
 * @package Design_Patterns\ChainOfResponsibility
 */
class TaskStatus {
    public $doOne = true;
    public $doTwo = true;
    public $doThree = true;

}


$taskOne = new TaskOne();
$taskTwo = new TaskTwo();
$taskThree = new TaskThree();

$taskOne->succeedWith($taskTwo);
$taskTwo->succeedWith($taskThree);
try{
    $taskOne->check(new TaskStatus);
}catch (Throwable $e){
    echo $e->getMessage();
}
