<?php
namespace Design_Patterns\TemplateMethod;

/**
 * @package Design_Patterns\TemplateMethod
 */

abstract class Book {
    protected $title;
    protected $content;

    function setTitle( $str )
    {
        $this->title = $str;
    }

    function setContent( $str )
    {
        $this->content = $str;
    }
}

class Paperback extends Book {

    function printBook()
    {
        var_dump("The book '{$this->title}' was printed.");
    }
}

class Ebook extends Book {

    function generatePdf()
    {
        var_dump("A PDF was generated for the eBook '{$this->title}'.");
    }
}