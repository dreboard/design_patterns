<?php
require_once "../vendor/autoload.php";
use Design_Patterns\Singleton\{Singleton, SingletonChild};

$obj = Singleton::getInstance();
$childObj = SingletonChild::getInstance();
var_dump($obj === Singleton::getInstance());
var_dump($childObj === Singleton::getInstance());
var_dump($childObj === SingletonChild::getInstance());