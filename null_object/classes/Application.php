<?php
namespace Design_Patterns\NullObject;

/**
 * Class Application
 * @package Design_Patterns\NullObject
 */
class Application
{
    /**
     * @param CommandInterface $command
     * @return mixed|void
     */
    public function run(CommandInterface $command = null)
    {
        $executableCommand = $command ?? new NullCommand();

        return $executableCommand->execute();
    }
}