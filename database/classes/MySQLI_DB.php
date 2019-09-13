<?php
namespace Design_Patterns\Database;


/**
 * Class MySQLI_DB
 * @package Design_Patterns\Database
 */
class MySQLI_DB
{
    /**
     * @var MySQLIDB
     */
    private $_connection;
    /**
     * @var
     */
    private static $_instance; //The single instance
    /**
     * @var string
     */
    private $_host = "HOSTt";
    /**
     * @var string
     */
    private $_username = "USERNAME";
    /**
     * @var string
     */
    private $_password = "PASSWORd";
    /**
     * @var string
     */
    private $_database = "DATABASE";

    /**
     * Get an instance of the Database
     *
     * @return $_instance
     */
    public static function getInstance() {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    /**
     * MySQLI constructor.
     */
    private function __construct() {
        $this->_connection = new MySQLIDB($this->_host, $this->_username,
            $this->_password, $this->_database);

        if(mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
                E_USER_ERROR);
        }
    }


    /**
     * Prevent cloning of singleton object
     */
    private function __clone() { }

    /**
     *
     */
    private function __wakeup() {
        // Stopping unserialize of object
    }
    /**
     * @return MySQLIDB
     */
    public function getConnection() {
        return $this->_connection;
    }
}