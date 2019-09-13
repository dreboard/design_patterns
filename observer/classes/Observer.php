<?php
namespace Design_Patterns\Observer;


/**
 * Interface Observer
 * @package Design_Patterns\Observer
 */
interface Observer
{
    /**
     * @return mixed
     */
    public function handle();
}