<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author gosia
 */
class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    
    function __construct($firstName, $lastName, $email, $password)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    function getFirstName()
    {
        return $this->firstName;
    }
    
    function getLastName()
    {
        return $this->lastName;
    }
    
    function getEmail()
    {
        return $this->email;
    }
    
    function getPassword()
    {
        return $this->password;
    }

    function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function selectByIdFromDB($id)
    {
        //$mysqli = new mysqli('DB_DNS', 'DB_USER', 'DB_PASSWORD', 'DB_DBNAME');
        $mysqli = new mysqli('localhost', 'root', 'coderslab', 'cl_online_shop_Test');
//        $mysqli = new mysqli('localhost', 'root', 'coderslab', DB_DBNAME);
        $sql  = 'SELECT `id`, `firstName`, `lastName`, `email`, `password` FROM `user` WHERE `id`='.$id;
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        
        return $row;
    }

    /**
     * static loadUserById
     * @param Connection $connection
     * @param int $id
     * @return array
     */
    static public function loadUserById(Connection $connection, $id)
    {
        $sql  = 'SELECT `id`, `firstName`, `lastName`, `email`, `password` FROM `user` WHERE `id`='.$id;
        
        $result = $connection->query($sql);
        
        if($result == true && $result->num_rows == 1){
            
            $row = $result->fetch_assoc();
            
            return $row;
        }
        return null;
    }
}
