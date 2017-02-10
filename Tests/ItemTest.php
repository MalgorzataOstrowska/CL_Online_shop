<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemTest
 *
 * @author lukasz
 */
class ItemTest extends PHPUnit_Framework_TestCase {
    
    public function testGetName(){
        
        $item = new Item();
        $item -> setName('Rower');
        
        $this -> assertEquals('Rower', $item -> getName());
        
    }
    
    public function testGetPrice(){
        
        $item = new Item();
        $item -> setPrice(15);
        
        $this -> assertEquals(15, $item -> getPrice());
        
    }
    
    public function testGetDescription(){
        
        $item = new Item();
        $item -> setDescription('Opis przedmiotu');
        
         $this -> assertEquals('Opis przedmiotu', $item -> getDescription());
        
    }
    
    public function testGetAvailability(){
        
         $item = new Item();
         $item ->setAvailability(5);
        
         $this -> assertEquals(5, $item ->getAvailability());
        
    }
    
    public function testGetID(){
        
         $item = new Item();
         $item ->setID(1);
        
         $this -> assertEquals(1, $item ->getID());
        
    }
}
