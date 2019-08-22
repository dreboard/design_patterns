<?php

interface CommandInterface
{
    public function execute();
}

class OutputCommand implements CommandInterface
{
    public function execute()
    {
        echo 'Output from the command';
    }
}

class FileCommand implements CommandInterface
{
    public function execute()
    {
        file_put_contents(__DIR__.'/log.txt', date('Y-m-d H:i:s')."\n", FILE_APPEND | LOCK_EX);
    }
}

class NullCommand implements CommandInterface
{
    public function execute()
    {
        // Do nothing.
    }
}

class Application
{
    public function run(CommandInterface $command)
    {
        $executableCommand = $command ?? new NullCommand();

        return $executableCommand->execute();
    }
}

$outputCommand = new OutputCommand();
$fileCommand = new FileCommand();
$app = new Application();

// Echo predefined string
$app->run($outputCommand); // Output from the command

// Create a file and append string to it
$app->run($fileCommand);

// Do nothing
$app->run();