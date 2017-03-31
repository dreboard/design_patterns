<?php
namespace Design_Patterns\Decorator;

/**
 * @package Design_Patterns\Decorator
 */
class BoldText implements DecoratorInterface
{
    /** @var string */
    protected $string;

    /**
     * BoldTextPrinter constructor.
     *
     * @param DecoratorInterface $printer
     */
    public function __construct(DecoratorInterface $printer)
    {
        $this->printer = $printer;
    }

    /**
     * Output bold text string
     *
     * @return string
     */
    public function outputString():string
    {
        return '<strong>'.$this->printer->outputString().'</strong>';
    }
}