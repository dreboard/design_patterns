<?php
namespace Design_Patterns\Strategy;


class App
{
    /**
     * Log data
     *
     * @param string $data
     * @param Logger $logger
     */
    public function logit($data, Logger $logger = null)
    {
        $logger = $logger ?: new FileLogger();
        $logger->log($data);
    }
}