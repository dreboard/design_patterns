<?php
namespace Design_Patterns\Facade;

/**
 * Class DatabaseMessage
 * @package Design_Patterns\Facade
 */
class DatabaseMessage implements MessageInterface {

    /**
     * Log message to the database
     * @param string $message
     */
    public function setMessage(string $message)
    {
        // TODO: Log message to the database
    }
}