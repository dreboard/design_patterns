<?php

namespace Design_Patterns\NullObject;


/**
 * Interface CommandInterface
 * @package Design_Patterns\NullObject
 */
interface CommandInterface
{
    /**
     * @return mixed
     */
    public function execute();
}