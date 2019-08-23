<?php
namespace Design_Patterns\Facade;

/**
 * Class ExampleClient
 * @package Design_Patterns\Facade
 */
class ExampleClient
{
    /**
     * @var MessageInterface
     */
    private $database;
    /**
     * @var MessageInterface
     */
    private $email;
    /**
     * @var MessageInterface
     */
    private $log;

    /**
     * ExampleClient constructor.
     * @param MessageInterface $database
     * @param MessageInterface $email
     * @param MessageInterface $log
     */
    public function __construct(MessageInterface $database, MessageInterface $email, MessageInterface $log)
    {
        $this->database = $database;
        $this->email = $email;
        $this->log = $log;
    }

    /**
     * @param $message
     * @return $this
     */
    public function setMessengers($message)
    {
        $this->database->setMessage($message);
        $this->email->setMessage($message);
        $this->log->setMessage($message);

        return $this;
    }
}