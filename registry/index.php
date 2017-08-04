<?php
//namespace Design_Patterns\Registry;

/**
 * Registry Pattern Example
 * @package Design_Patterns\Registry
 */
class Registry {

    /**
     * @var array $objects
     * Array of all objects added to the registry
     */
    private $objects = [];


    /**
     * @param $name
     * @param $object
     */
    public function set($name, &$object)
    {
        $this->objects[$name] = $object;
    }


    /**
     * @param null $name
     * @return mixed
     */
    public function &get($name = null)
    {
        if (array_key_exists($name, $this->objects)){
            return $this->objects[$name];
        } else {
            throw new \UnexpectedValueException(sprintf('This object not found: "%s".', $name));
        }

    }

    /**
     * @param array $objects
     * @return Registry
     */
    public function setObjects(array $objects): Registry
    {
        $this->objects = $objects;
        return $this;
    }

    /**
     * @return array
     */
    public function getObjects(): array
    {
        return $this->objects;
    }

}


///////////////////////////////////////////////////////////////////////////////////////
/// //As a singleton

class TesterClass {
    public function testMethod($arg)
    {
        echo "Hello from __CLASS__";
    }
}
class MyRegistry {
    
    private static $instance;
    
    private $storage;
    
    private function __construct() {}

    public static function getInstance()
    {
        if (!self::$instance instanceof self){
            self::$instance = new MyRegistry();
        }
        return self::$instance;
    }

    public function __set($key, $val)
    {
        $this->storage[$key] = $val;
    }

    public function __get($key)
    {
        if(isset($this->storage[$key])){
            return $this->storage[$key];
        }
        return false;
    }
}
$myreg = MyRegistry::getInstance();
$myreg->test = 'hello';
call_user_func(['TesterClass', 'testMethod'], 'arg');