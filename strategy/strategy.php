<?php
namespace Design_Patterns\Strategy;

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
    public function log($text);
}

class FileLogger2 implements Logger2
{

    /**
     * Log message to a text file
     *
     * @param string $data
     * @return bool|mixed
     */
    public function log($data)
    {
        try {
            $data = "{$data} ". time()." \r\n";
            file_put_contents('logfile.txt', $data, FILE_APPEND);
            return true;
        } catch (\Exception $e){
            error_log($e->getMessage());
            return false;
        }
    }
}

class EmailLogger2 implements Logger2
{

    /**
     * Send logging message as an email
     *
     * @param string $data
     * @return mixed|void
     */
    public function log($data)
    {
        try {
            $to      = 'Admin <nobody@example.com>';
            $subject = 'Site Log';
            $message = $data;
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
        } catch (\Exception $e){
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

(new App)->logit('Some data', new FileLogger2());