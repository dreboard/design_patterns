<?php
namespace Design_Patterns\Observer;


/**
 * Class LogThrottle
 * @package Design_Patterns\Observer
 */
class LogThrottle implements Observer {

    /**
     *
     */
    public function handle()
    {
        echo 'Count unsuccessful attempts.';
    }
}