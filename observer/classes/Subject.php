<?php
namespace Design_Patterns\Observer;


/**
 * Interface Subject
 * @package Design_Patterns\Observer
 */
interface Subject
{
    /**
     * @param $observable
     * @return mixed
     */
    public function attach($observable);

    /**
     * @param $observer
     * @return mixed
     */
    public function detach($observer);

    /**
     * @return mixed
     */
    public function notify();
}