<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author gosia
 */
class Order
{
    private $id;
    private $user_id;
    
    function __construct()
    {
        $this->id = -1;
        $this->user_id = -1;
    }

    function getId()
    {
        return $this->id;
    }

    function getUser_id()
    {
        return $this->user_id;
    }

    function setId($id)
    {
        if (is_numeric($id)) {
            $this->id = $id;
        }
    }

    function setUser_id($user_id)
    {
        if (is_numeric($user_id)) {
            $this->user_id = $user_id;
        }
    }

}
