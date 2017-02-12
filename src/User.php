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
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    
    function __construct()
    {
        $this->id = -1;
        $this->firstName = '';
        $this->lastName = '';
        $this->email = '';
        $this->password = '';
    }

    function getId()
    {
        return $this->id;
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
    
    function setId($id)
    {
        $this->id = $id;
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
    
    /**
     * saveToDB
     * @param Connection $connection
     * @return boolean
     */
    public function saveToDB(Connection $connection)
    {
        if($this->id == -1){
            // save
            $sql  = "INSERT INTO `user` 
                     (`id`, `firstName`, `lastName`, `email`, `password`)
                     VALUES 
                     (NULL, '$this->firstName', '$this->lastName', '$this->email', '$this->password')";
            
            $result = $connection->query($sql);
            
            if($result == true){
                $this->id = $connection->mysqli->insert_id;
                return true;
            }
        } else{
            // update
            $sql = "UPDATE `user` SET 
                    `firstName` = '$this->firstName', 
                    `lastName` = '$this->lastName', 
                    `email` = '$this->email', 
                    `password` = '$this->password' 
                    WHERE 
                    `user`.`id` = '$this->id'";
            
            $result = $connection->query($sql);
            
            if($result == true){
                return true;
            }
        }
        return false;            
    }
}
