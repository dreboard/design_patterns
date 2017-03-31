<?php
namespace Design_Patterns\Decorator;

/**
 * @package Design_Patterns\Decorator
 */
class StripTagsText implements DecoratorInterface
{
    /** @var string */
    protected $string;

    /**
     * StripTagsPrinter constructor.
     *
     * @param DecoratorInterface $printer
     */
    public function __construct(DecoratorInterface $printer)
    {
        $this->printer = $printer;
    }

    /**
     * Strip output the string passed into the constructor
     *
     * @return string
     */
    public function outputString():string
    {
        return strip_tags($this->printer->outputString());
    }
}