<?php
namespace Design_Patterns\Observer;


class UserCredentials implements Observer {

    /**
     *
     */
    public function handle()
    {
        echo 'return session data.';
    }
}