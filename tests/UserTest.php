<?php


/**
 * Description of UserTest
 *
 * @author gosia
 */
class UserTest extends ConnectionTest
{
//    public function testUserTestExists()
//    {
//        $user = new User();
//        $this->assertInstanceOf(User::class, $user);
//    }
    
    private $user;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    
    protected function setUp()
    {
        $this->firstName = 'Małgorzata';
        $this->lastName = 'Ostrowska';
        $this->email = 'gosia@gmail.com';
        $this->password = 'gosiaPassword';

        $this->user = new User($this->firstName, $this->lastName, $this->email, $this->password);
    }
    protected function tearDown()
    {
        $this->user = null;
    }    
    
    public function testUserTestExists()
    {
        $this->assertInstanceOf(User::class, $this->user);
    }    
    
    public function testGetFirstName()
    {
        $this->assertEquals($this->firstName,$this->user->getFirstName());
    }
    
    public function testGetLastName()
    {
        $this->assertEquals($this->lastName,$this->user->getLastName());
    }
    
    public function testGetEmail()
    {
        $this->assertEquals($this->email,$this->user->getEmail());
    }
    
    public function testGetPassword()
    {
        $this->assertEquals($this->password,$this->user->getPassword());
    }
    
    public function testSetFirstName()
    {
        $this->user->setFirstName('Małgorzata');
        $this->assertEquals('Małgorzata',$this->user->getFirstName());
    }  
    
    public function testSetLastName()
    {
        $this->user->setLastName('Ostrowska');
        $this->assertEquals('Ostrowska',$this->user->getLastName());
    }  
    
    public function testSetEmail()
    {
        $this->user->setEmail('gosia@gmail.com');
        $this->assertEquals('gosia@gmail.com',$this->user->getEmail());
    }  
    
    public function testSetPassword()
    {
        $this->user->setPassword('gosia@gmail.com');
        $this->assertEquals('gosia@gmail.com',$this->user->getPassword());
    }  
    
    public function testConstructFirstName()
    {
        new User('Małgorzata','Ostrowska','gosia@gmail.com','gosiaPassword');
        $this->assertEquals('Małgorzata',$this->user->getFirstName());
    }    
    
    public function testConstructLastName()
    {
        new User('Małgorzata','Ostrowska','gosia@gmail.com','gosiaPassword');
        $this->assertEquals('Ostrowska',$this->user->getLastName());
    }    
    
    public function testConstructEmali()
    {
        new User('Małgorzata','Ostrowska','gosia@gmail.com','gosiaPassword');
        $this->assertEquals('gosia@gmail.com',$this->user->getEmail());
    }    
    
    public function testConstructPassword()
    {
        new User('Małgorzata','Ostrowska','gosia@gmail.com','gosiaPassword');
        $this->assertEquals('gosiaPassword',$this->user->getPassword());
    }       
    
    public function testLoadUserById()
    {
        $config = require_once  __DIR__ . './../conf/configurationTest.php'; 
        $connection = new Connection($config);
        
        $id = 1;
        $row = $this->user->loadUserById($connection, $id);
        
        $this->assertEquals(1, $row["id"]);
        $this->assertEquals('Jane', $row["firstName"]);
        $this->assertEquals('Doe', $row["lastName"]);
        $this->assertEquals('jane.doe@gmail.com', $row["email"]);
        $this->assertEquals('janePassword', $row["password"]);
    }    
    
}
