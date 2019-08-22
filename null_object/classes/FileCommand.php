<?php
namespace Design_Patterns\NullObject;

/**
 * @package Design_Patterns\NullObject
 */

class FileCommand implements CommandInterface
{

    /**
     * Output message to a file
     *
     * @return void
     */
    public function execute():void
    {
        file_put_contents(__DIR__.'/../log.txt', date('Y-m-d H:i:s'), FILE_APPEND | LOCK_EX);
    }
}