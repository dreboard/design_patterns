<?php
namespace Design_Patterns\Observer;


/**
 * Class LogHandler
 * @package Design_Patterns\Observer
 */
class LogHandler implements Observer {

    /**
     *
     */
    public function handle()
    {
        echo 'Log users ip and date.';
    }
}