<?php
namespace Design_Patterns\Observer;
use Exception;

/**
 * PHP Patterns: Observer
 * User: owner
 * Date: 2/1/2017
 * Time: 1:31 PM
 */

interface Subject {
    public function attach($observable);
    public function detach($observer);
    public function notify();
}

interface Observer {
    public function handle();
}

/**
 * Conforms to Open/Closed principle
 * new functionality can be given to Observers
 */
class Login implements Subject {

    protected $observers = [];


    public function attach($observable)
    {
        if (is_array($observable))
        {
            $this->attachObservers($observable);
            return;
        }
        $this->observers[] = $observable;
        return $this;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->handle();
        }
    }

    /**
     * @param $observers
     * @throws Exception
     */
    public function attachObservers($observers)
    {
        foreach ($observers as $observer) {
            if (!$observer instanceof Observer)
                throw new Exception("Must be of type Observer");

            $this->attach($observer);
        }
    }

    /**
     * perform login and update nay listeners
     */
    public function loginUser()
    {
        $this->notify();
    }
}

class LogHandler implements Observer {

    public function handle()
    {
        print_r('Log users ip, date.');
    }
}

class LogThrottle implements Observer {

    public function handle()
    {
        print_r('Count unsuccessful attempts.');
    }
}

class UserCredentials implements Observer {

    public function handle()
    {
        print_r('return session data.');
    }
}


$login = new Login();
$login->attach([
    new LogHandler(),
    new UserCredentials(),
    new LogThrottle()
]);
$login->loginUser();




