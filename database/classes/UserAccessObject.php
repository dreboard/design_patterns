<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 8/1/2017
 * Time: 1:35 AM
 */

namespace Design_Patterns\Database;


/**
 * Class UserAccessObject
 * @package Design_Patterns\Database
 */
class UserAccessObject
{

    /**
     * UserAccessObject constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
        
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $stmt = $this->db->prepare('
            SELECT "User", users.* 
             FROM users 
             WHERE id = :id
        ');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Set the fetchmode to populate an instance of 'User'
        // This enables us to use the following:
        //     $user = $repository->find(1234);
        //     echo $user->firstname;
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        return $stmt->fetch();
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        $stmt = $this->db->prepare('
            SELECT * FROM users
        ');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

        // fetchAll() will do the same as above, but we'll have an array. ie:
        //    $users = $repository->findAll();
        //    echo $users[0]->firstname;
        return $stmt->fetchAll();
    }

    /**
     * @param \User $user
     * @return mixed
     */
    public function save(\User $user)
    {
        // If the ID is set, we're updating an existing record
        if (isset($user->id)) {
            return $this->update($user);
        }
        $stmt = $this->db->prepare('
            INSERT INTO users 
                (username, firstname, lastname, email) 
            VALUES 
                (:username, :firstname , :lastname, :email)
        ');
        $stmt->bindParam(':username', $user->username);
        $stmt->bindParam(':firstname', $user->firstname);
        $stmt->bindParam(':lastname', $user->lastname);
        $stmt->bindParam(':email', $user->email);
        return $stmt->execute();
    }

    /**
     * @param \User $user
     * @return mixed
     */
    public function update(\User $user)
    {
        if (!isset($user->id)) {
            // We can't update a record unless it exists...
            throw new \LogicException(
                'Cannot update user that does not yet exist in the database.'
            );
        }
        $stmt = $this->db->prepare('
            UPDATE users
            SET username = :username,
                firstname = :firstname,
                lastname = :lastname,
                email = :email
            WHERE id = :id
        ');
        $stmt->bindParam(':username', $user->username);
        $stmt->bindParam(':firstname', $user->firstname);
        $stmt->bindParam(':lastname', $user->lastname);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':id', $user->id);
        return $stmt->execute();
    }
}