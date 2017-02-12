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

    /**
     * getId
     * @return string
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * getFirstName
     * @return string
     */
    function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * getLastName
     * @return string
     */
    function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * getEmail
     * @return string
     */
    function getEmail()
    {
        return $this->email;
    }
    
    /**
     * getPassword
     * @return string
     */
    function getPassword()
    {
        return $this->password;
    }
    
    /**
     * setId
     * @param string $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * setFirstName
     * @param string $firstName
     */
    function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * setLastName
     * @param string $lastName
     */
    function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * setEmail
     * @param string $email
     */
    function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * setPassword
     * @param string $password
     */
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
     * static loadAllUsers
     * @param Connection $connection
     * @return \User
     */
    static public function loadAllUsers(Connection $connection)
    {
        $sql = "SELECT * FROM user";
        $allUsers = [];
        $result = $connection->query($sql);
        
        if($result == true && $result->num_rows != 0){
            
            foreach($result as $row){
                
                $loadedUser = new User();
                $loadedUser->id = $row['id'];
                $loadedUser->firstName = $row['firstName'];
                $loadedUser->lastName = $row['lastName'];
                $loadedUser->email = $row['email'];
                $loadedUser->password = $row['password'];
                               
                $allUsers[] = $loadedUser;
            }
        }
        return $allUsers;
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
    

    public function deleteById(Connection $connection, $id)
    {
        $sql = "DELETE FROM user WHERE id=$id";

        $result = $connection->query($sql);
        echo $count = $connection->mysqli->affected_rows;

        if($count == 1){

            return true;
        }
        
        return false;
    }
}
