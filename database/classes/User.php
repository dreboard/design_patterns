<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 8/1/2017
 * Time: 1:34 AM
 */

namespace Design_Patterns\Database;


/**
 * Class User
 * @package Design_Patterns\Database
 */
class User
{
    /**
     * @var mixed
     */
    public $id;
    /**
     * @var mixed
     */
    public $username;
    /**
     * @var mixed
     */
    public $firstname;
    /**
     * @var mixed
     */
    public $lastname;
    /**
     * @var mixed
     */
    public $email;

    /**
     * User constructor.
     * @param null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data)) {
            if (isset($data['id'])) $this->id = $data['id'];

            $this->username = $data['username'];
            $this->firstname = $data['firstname'];
            $this->lastname = $data['lastname'];
            $this->email = $data['email'];
        }
    }


    /**
     *
     */
    public function getFullname()
    {
        echo $this->firstname . ' ' . $this->lastname;
    }
}