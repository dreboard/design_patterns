<?php
namespace Design_Patterns\NullObject;

/**
 * @package Design_Patterns\NullObject
 */

class NullCommand implements CommandInterface
{

    /**
     * Output nothing
     *
     * @return void
     */
    public function execute():void
    {

    }
}