<?php
namespace Design_Patterns\TemplateMethod;

/**
 * @package Design_Patterns\TemplateMethod
 */
abstract class ShapeBase {

    function makeShape( )
    {
        return $this
            ->drawBorder()
            ->innerColor()
            ->borderColor()
            ->drawShape();
    }

    function drawBorder( )
    {
        var_dump("Drawing border");
        return $this;
    }
    function innerColor( )
    {
        var_dump("Filling with color");
        return $this;
    }

    function borderColor( )
    {
        var_dump("Coloring border");
        return $this;
    }

    protected abstract function drawShape( );
}

class CircleShape extends ShapeBase {

    function drawShape( )
    {
        echo "Drawing square and Calculating area";
        return $this;
    }


}
class SquareShape extends ShapeBase {

    function drawShape( )
    {
        echo "Drawing circle and calculating radius";
        return $this;
    }

}

$ts = (new CircleShape())->makeShape();

$vs = (new SquareShape())->makeShape();

