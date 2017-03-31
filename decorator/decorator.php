<?php
namespace Design_Patterns\Decorator;


interface DecoratorInterface
{
    public function outputString();
}


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
     * Output the string passed into the constructor
     *
     * @return string
     */
    public function outputString():string
    {
        return '<strong>'.$this->printer->outputString().'</strong>';
    }
}
// Testing: phpunit decorator/tests/DecoratorTest.php
$string = "<p>Text with markup</p>";
$decorator = new BoldText(new StripTagsText(new StringPrinter($string)));
$decorator->outputString();

