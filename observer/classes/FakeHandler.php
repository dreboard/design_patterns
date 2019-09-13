<?php
namespace Design_Patterns\Observer;


/**
 * Class FakeHandler
 * @package Design_Patterns\Observer
 */
class FakeHandler {

    /**
     *
     */
    public function handle()
    {
        print_r('Log users ip, date.');
    }
}