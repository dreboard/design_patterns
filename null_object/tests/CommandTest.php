<?php
declare(strict_types=1);

require __DIR__ . '/../null_object.php';
use PHPUnit\Framework\TestCase;

final class CommandTest extends TestCase
{

    public function testNullCommandWithNoObject()
    {
        $app = new Application();
        //$this->assertEmpty('');
		$this->assertEquals( '', $app->run());
    }
    public function testNullCommand()
    {
        $nullCommand = new NullCommand();
        $app = new Application();
		$this->assertEquals( '', $app->run($nullCommand));
    }
    public function testOutputCommand()
    {
        $outputCommand = new OutputCommand();
        $app = new Application();
        $app->run($outputCommand);
        $this->expectOutputString('Output from the command');
    }
    public function testFileCommand()
    {
        $date = date('Y-m-d H:i:s');
        $fileCommand = new FileCommand();
        $app = new Application();
        $app->run($fileCommand);
        $this->assertFileExists(__DIR__ . '/log.txt');
		$contents = file_get_contents(__DIR__ . '/log.txt');
		$this->assertNotFalse(strpos($contents, date('Y-m-d')));
    }
}