<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Item
 *
 * @author lukasz
 */


class Item {
    
    protected $id;
    private $name;
    private $price;
    private $description;
    private $availability;
    
    public function __construct() {
        $this -> id;
        $this -> name;
        $this -> price;
        $this -> description;
        $this -> availability;
        
    }
    
    //--------SETERY-------------
    public function setName($name){
        $this -> name = $name;
    }
    
    public function setPrice($price){
        
         if (!(is_numeric($price) && $price > 0)){     // Cenę można podać jako intregera lub numerycznego stringa ale nie może być mniejsza bądź równa 0
            die('ZŁA WARTOŚĆ');
        }
        $this -> price = $price;
    }
    
    public function setDescription($description){
        $this -> description = $description;
    }
    
    public function setAvailability($availability){
        
        if($availability >= 0){                       // Dostępność może być równa 0 i większa
            $this -> availability = $availability;
        }
        else{
            die('ZŁA WARTOŚĆ');
        }
    }
    
    public function setID($id){
        $this -> id = $id;
    }
    
    //---------GETERY--------------
    public function getName(){
        return $this -> name;
    }
    
    public function getPrice(){
        return $this -> price;
    }
    
    public function getDescription(){
        return $this -> description;
    }
    
    public function getAvailability(){
        return $this -> availability;
    }
    
    public function getID(){
        return $this -> id;
    }
    
}
