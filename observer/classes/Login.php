<?php
namespace Design_Patterns\Observer;


/**
 * Conforms to Open/Closed principle
 * new functionality can be given to Observers
 */
class Login implements Subject {

    protected $observers = [];


    /**
     * @param $observable
     * @return mixed
     */
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

    /**
     * @param $index
     */
    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    /**
     *
     */
    public function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->handle();
        }
    }

    /**
     * @param array $observers
     * @throws \Exception
     */
    public function attachObservers($observers)
    {
        foreach ($observers as $observer) {
            if (!$observer instanceof Observer)
                throw new \Exception("Must be of type Observer");

            $this->attach($observer);
        }
    }

    /**
     * perform login and update listeners
     */
    public function loginUser()
    {
        $this->notify();
    }
}