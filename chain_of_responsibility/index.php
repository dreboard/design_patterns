<?php

require_once "../vendor/autoload.php";
use Design_Patterns\ChainOfResponsibility\{TaskOne, TaskTwo, TaskThree, TaskStatus};

$taskOne = new TaskOne();
$taskTwo = new TaskTwo();
$taskThree = new TaskThree();

$taskOne->succeedWith($taskTwo);
$taskTwo->succeedWith($taskThree);
$taskStatus = new TaskStatus;
$taskStatus->setTask('doOne', false);
try{
    $taskOne->check($taskStatus);
}catch (Throwable $e){
    echo $e->getMessage();
}
