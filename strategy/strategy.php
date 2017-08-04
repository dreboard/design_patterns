<?php

namespace Design_Patterns\Strategy;
require_once "../vendor/autoload.php";

use MySQLHandler\MySQLHandler;
use Monolog\Logger as Logger;
use Monolog\Handler\StreamHandler as StreamHandler;

/**
 * @package Design_Patterns\Strategy
 */
interface Logger2
{
    /**
     * Log data
     *
     * @param string $text
     * @return mixed
     */
    public function log(string $data);
}

class FileLogger2 implements Logger2
{
    protected $logger;

    public function __construct()
    {
        $this->logger = new Logger('file_logger');
        $this->logger->pushHandler(new StreamHandler('logs.log', Logger::WARNING));
    }

    /**
     * Log message to a text file
     *
     * @param string $data
     * @return bool|mixed
     */
    public function log(string $data)
    {
        $this->logger->warning($data . ' From class ' . __CLASS__);
    }
}

class EmailLogger2 implements Logger2
{

    protected $logger;

    public function __construct()
    {
        $this->logger = new Logger('mail_logger');
        $this->logger->pushHandler(new StreamHandler('logs.log', Logger::WARNING));
    }

    /**
     * Send logging message as an email
     *
     * @param string $data
     * @return mixed|void
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

class DBLogger2 implements Logger2
{

    protected $dbName = "test";
    protected $dbHost = "localhost";
    protected $dbUser = "root";
    protected $dbPass = "";
    protected $logger;

    public function __construct()
    {
        try {
            $db = new \PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPass);
            $mySQLHandler = new MySQLHandler($db, "logs");

            $this->logger = new Logger('db_logger');
            $this->logger->pushHandler($mySQLHandler);
            echo 'CONNECTED';
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
            echo $e->getMessage();
            $this->logger->error($e->getMessage());
            error_log($e->getMessage());
        }
    }
}

class App
{
    /**
     * @param $data
     * @param Logger2 $logger
     */
    public function logit($data, Logger2 $logger)
    {
        $logger = $logger ?: new FileLogger2();
        $logger->log($data);
    }
}

//phpunit strategy/tests/StrategyTest.php

try {
    (new App)->logit('Some data', new DBLogger2());
} catch (\Throwable $e) {
    echo $e->getMessage();
}