<?php
namespace Design_Patterns\NullObject;

/**
 * @package Design_Patterns\NullObject
 */

class OutputCommand implements CommandInterface
{

    /**
     * Output message as a string
     *
     * @return string
     */
    public function execute():void
    {
        echo 'Output from the command';
    }
}