<?php
use LibraryLoaderAutoloader,
    LibraryControllerFrontController;
    
require_once __DIR__ . "/Library/Loader/Autoloader.php";
$autoloader = new Autoloader;
$autoloader->register();

$frontController = new FrontController();
$frontController->run();