<?php

namespace Design_Patterns\Strategy;

use Monolog\Logger as Logger;
use Monolog\Handler\StreamHandler as StreamHandler;

/**
 * class EmailLogger
 * @package Design_Patterns\Strategy
 */
class EmailLogger implements ILogger
{

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * EmailLogger constructor.
     */
    public function __construct()
    {
        $this->logger = new Logger('mail_logger');
        $this->logger->pushHandler(new StreamHandler('../logs.log', Logger::WARNING));
    }

    /**
     * Send logging message as an email
     *
     * @param string $data
     * @return void
     */
    public function log(string $data)
    {
        try {
            $to = 'Admin <nobody@example.com>';
            $subject = 'Site Log';
            $message = $data;
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
        } catch (\Throwable $e) {
            $this->logger->error($e->getMessage());
        }
    }
}