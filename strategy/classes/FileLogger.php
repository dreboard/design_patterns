<?php
namespace Design_Patterns\Strategy;

/**
 * @package Design_Patterns\Strategy
 */

class FileLogger implements Logger
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
            if(file_put_contents('logfile.txt', $data, FILE_APPEND)){
                return true;
            }
            return false;

        } catch (Exception $e){
            error_log($e->getMessage());
            return false;
        }
    }
}