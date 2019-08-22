<?php
namespace Design_Patterns\Database;

/**
 * Class PDO_DB
 * @package Design_Patterns\Database
 */
class PDO_DB
{
    /**
     * @var mixed|null
     */
    private $dbName = null;

    /**
     * @var mixed|null
     */
    private $dbHost = null;

    /**
     * @var mixed|null
     */
    private $dbPass = null;

    /**
     * @var mixed|null
     */
    private $dbUser = null;

    /**
     * @var null
     */
    private static $instance = null;

    /**
     * DBConnect constructor.
     * @param array $dbDetails
     */
    private function __construct($dbDetails = array())
    {
        $this->dbName = $dbDetails['db_name'];
        $this->dbHost = $dbDetails['db_host'];
        $this->dbUser = $dbDetails['db_user'];
        $this->dbPass = $dbDetails['db_pass'];
        $this->dbh = new \PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName, $this->dbUser, $this->dbPass);
    }

    /**
     * @param array $dbDetails
     * @return PDODB|null
     */
    public static function connect($dbDetails = array()) {
        if(self::$instance == null) {
            self::$instance = new PDODB($dbDetails);
        }

        return self::$instance;

    }

    /**
     *
     */
    private function __clone() {
        // Stopping Clonning of Object
    }

    /**
     *
     */
    private function __wakeup() {
        // Stopping unserialize of object
    }
}