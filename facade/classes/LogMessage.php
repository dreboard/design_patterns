<?php
namespace Design_Patterns\Facade;

/**
 * Class LogMessage
 * @package Design_Patterns\Facade
 */
class LogMessage implements MessageInterface {

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        // TODO: Log message to the file
    }
}