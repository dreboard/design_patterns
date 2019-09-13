<?php
namespace Design_Patterns\TemplateMethod;


/**
 * Class App
 * @package Design_Patterns\TemplateMethod
 */
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