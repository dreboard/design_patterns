<?php
namespace Design_Patterns\Singleton;

/**
 * Class Singleton
 * Singleton Design Pattern Example
 * @package Design_Patterns\Singleton
 */
class Singleton {

    /**
     * @var $instance
     */
    protected static $instance;

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if(null === static::$instance){
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * Prevent creation of Singleton class
     *
     */
    protected function __construct(){}

    /**
     * Prevent copying of Singleton class
     */
    protected function __clone(){}

    /**
     * Prevent unserialization of Singleton class
     */
    protected function __wakeup(){}
}