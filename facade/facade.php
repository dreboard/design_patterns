<?php
require_once __DIR__.'/../vendor/autoload.php';

interface MessageInterface {
    public function setMessage(string $message);
}

class DatabaseMessage implements MessageInterface {

    public function setMessage(string $message)
    {
        // TODO: Log message to the database
    }
}
class EmailMessage implements MessageInterface {

    public function setMessage(string $message)
    {
        // TODO: send message by email
    }
}
class LogMessage implements MessageInterface {

    public function setMessage(string $message)
    {
        // TODO: Log message to the file
    }
}
class ExampleClient
{
    private $database;
    private $email;
    private $log;

    public function __construct(MessageInterface $database, MessageInterface $email, MessageInterface $log)
    {
        $this->database = $database;
        $this->email = $email;
        $this->log = $log;
    }

    public function setMessengers($message)
    {
        $this->database->setMessage($message);
        $this->email->setMessage($message);
        $this->log->setMessage($message);

        return $this;
    }
}

$client = new ExampleClient(new database(), new email(), new log());

// we set the message once and share it on all three objects
$client->setMessengers('Facade pattern message.');