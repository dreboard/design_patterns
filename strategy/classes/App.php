<?php
namespace Design_Patterns\Strategy;


class App
{
    /**
     * Log data
     *
     * @param string $data
     * @param ILogger $logger
     */
    public function logit($data, ILogger $logger = null)
    {
        $logger = $logger ?: new FileILogger();
        $logger->log($data);
    }
}