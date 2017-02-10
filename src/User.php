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




}
