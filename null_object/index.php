<?php
require_once __DIR__.'/../vendor/autoload.php';
use Design_Patterns\NullObject\{Application, FileCommand, OutputCommand};
$outputCommand = new OutputCommand();
$fileCommand = new FileCommand();
$application = new Application();

// Echo predefined string
$application->run($outputCommand); // Output from the command

// Create a file and append string to it
$application->run($fileCommand);

// Do nothing
$application->run();