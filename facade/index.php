<?php
require_once __DIR__.'/../vendor/autoload.php';
use Design_Patterns\Facade\{DatabaseMessage, EmailMessage, LogMessage};
$client = new Design_Patterns\Facade\ExampleClient(
    new DatabaseMessage(),
    new EmailMessage(),
    new LogMessage()
);

// we set the message once and share it on all three objects
$client->setMessengers('Facade pattern message.');