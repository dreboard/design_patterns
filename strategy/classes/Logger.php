<?php
namespace Design_Patterns\Strategy;

/**
 * @package Design_Patterns\Strategy
 */

interface Logger
{
    /**
     * Log data
     *
     * @param string $text
     * @return mixed
     */
    public function log($text);
}