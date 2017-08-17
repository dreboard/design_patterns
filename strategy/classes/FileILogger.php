<?php

namespace Design_Patterns\Strategy;

use Monolog\Logger as Logger;
use Monolog\Handler\StreamHandler as StreamHandler;

/**
 * class FileLogger
 * Error logging for production
 *
 * @package Design_Patterns\Strategy
 */
class FileILogger implements ILogger
{

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * FileLogger constructor.
     */
    public function __construct()
    {
        $this->logger = new Logger('file_logger');
        $this->logger->pushHandler(new StreamHandler('logs.log', Logger::WARNING));
    }

    /**
     * Log message to a log file
     *
     * @param string $data
     * @return bool|mixed
     */
    public function log(string $data)
    {
        $this->logger->warning($data . ' From class ' . __CLASS__);
    }
}