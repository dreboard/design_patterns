<?php
namespace Design_Patterns\Decorator;

/**
 * @package Design_Patterns\Decorator
 */
class PrintString implements DecoratorInterface
{
    /** @var string */
    protected $string;

    /**
     * StringPrinter constructor.
     *
     * @param string $string
     */
    public function __construct(string $string)
    {
        $this->string = $string;
    }

    /**
     * Output the string passed into the constructor
     *
     * @return void
     */
    public function outputString()
    {
        print($this->string);
    }
}