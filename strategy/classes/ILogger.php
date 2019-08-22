<?php
namespace Design_Patterns\Strategy;

/**
 * Interface ILogger
 * @package Design_Patterns\Strategy
 */

interface ILogger
{
    /**
     * Log data
     *
     * @param string $text
     * @return mixed
     */
    public function log(string $text);
}