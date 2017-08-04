<?php

namespace Design_Patterns\Strategy;

use MySQLHandler\MySQLHandler;
use Monolog\Logger as Logger;

/**
 * Class DBLogger
 * Use Monolog MySQLHandler to handle database logging
 *
 * @package Design_Patterns\Strategy
 */
class DBLogger implements ILogger
{

    /**
     * @var string
     */
    protected $dbName = "test";
    /**
     * @var string
     */
    protected $dbHost = "localhost";
    /**
     * @var string
     */
    protected $dbUser = "root";
    /**
     * @var string
     */
    protected $dbPass = "";
    /**
     * @var Logger
     */
    protected $logger;

    /**
     * DBLogger constructor.
     */
    public function __construct()
    {
        try {
            $db = new \PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPass);
            $mySQLHandler = new MySQLHandler($db, "logs");
            $this->logger = new Logger('db_logger');
            $this->logger->pushHandler($mySQLHandler);
        } catch (\PDOException | \Throwable $e) {
            echo $e->getMessage();
        }

    }

    /**
     * Send logging message to db
     *
     * @param string $data
     * @return mixed|void
     */
    public function log(string $data)
    {
        try {
            $this->logger->warning($data);
        } catch (\Throwable $e) {
            $this->logger->error($e->getMessage());
        }
    }
}