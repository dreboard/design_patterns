<?php

namespace Design_Patterns\Facade;

/**
 * Class EmailMessage
 * @package Design_Patterns\Facade
 */
class EmailMessage implements MessageInterface {

    /**
     * send message by email
     * @param string $message
     */
    public function setMessage(string $message)
    {
        // TODO: send message by email
    }
}