<?php

/**
 * Description of OrderTest
 *
 * @author gosia
 */
class OrderTest extends ConnectionTest
{
//    public function OrderExists()
//    {
//        $order = new Order();
//        $this->assertInstanceOf(Order::class, $order);
//    }
    private $order;
    
    private $connection;
    private $config;
    
    protected function setUp()
    {
        $this->id = -1;
        $this->user_id = -1;
        
        // Order
        $this->order = new Order();
        
        // Connection
        $this->config = require  __DIR__ . './../conf/configurationTest.php';
        $this->connection = new Connection($this->config);
    }
    
    protected function tearDown()
    {
        $this->order = null;
        $this->connection = null;
    }  
    
// testClass:    
    public function testOrderExists()
    {
        $this->assertInstanceOf(Order::class, $this->order);
    } 
    
    public function testConnectionExists()
    {
        $this->assertInstanceOf(Connection::class, $this->connection);
    }  
    
// testGet:    
    public function testGetId()
    {
        $this->assertEquals($this->id,$this->order->getId());
    }
    
    public function testGetUser_id()
    {
        $this->assertEquals($this->user_id,$this->order->getUser_id());
    }
    
// testSet:     
    public function testSetId()
    {
        $this->order->setId(1);
        $this->assertEquals(1,$this->order->getId());
    } 
    
    public function testSetIdFalse()
    {
        $this->order->setId('jeden');
        $this->assertFalse('jeden' == $this->order->getId());
    }  
    
    public function testSetUser_id()
    {
        $this->order->setUser_id(1);
        $this->assertEquals(1,$this->order->getUser_id());
    }  
    
    public function testSetUser_idFalse()
    {
        $this->order->setUser_id('jeden');
        $this->assertFalse('jeden' == $this->order->getUser_id());
    }  
    
// testConstruct:      
    public function testConstruct()
    {
        $this->assertEquals(-1,$this->order->getId());
        $this->assertEquals(-1,$this->order->getUser_id());
    }       
}
