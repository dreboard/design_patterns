<?php
namespace Design_Patterns\Facade;

/**
 * Interface MessageInterface
 * @package Design_Patterns\Facade
 */
interface MessageInterface
{
    /**
     * @param string $message
     * @return mixed
     */
    public function setMessage(string $message);
}