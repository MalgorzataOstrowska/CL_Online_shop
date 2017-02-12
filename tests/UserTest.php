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
    
    private $connection;
    private $config;
    
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    
    protected function setUp()
    {
        // User
        $this->firstName = 'Małgorzata';
        $this->lastName = 'Ostrowska';
        $this->email = 'gosia@gmail.com';
        $this->password = 'gosiaPassword';
        $this->user = new User($this->firstName, $this->lastName, $this->email, $this->password);
        
        // Connection
        $this->config = require  __DIR__ . './../conf/configurationTest.php';
        $this->connection = new Connection($this->config);
    }
    protected function tearDown()
    {
        $this->user = null;
        $this->connection = null;
    }    

// testClass:    
    public function testUserExists()
    {
        $this->assertInstanceOf(User::class, $this->user);
    } 
    
    public function testConnectionExists()
    {
        $this->assertInstanceOf(Connection::class, $this->connection);
    }    

// testGet:    
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
    
// testSet:     
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
    
// testConstruct:      
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

// testLoad:    
    public function testLoadUserById()
    {
        $id = 1;
        $row = $this->user->loadUserById($this->connection, $id);
        
        $this->assertEquals(1, $row["id"]);
        $this->assertEquals('Jane', $row["firstName"]);
        $this->assertEquals('Doe', $row["lastName"]);
        $this->assertEquals('jane.doe@gmail.com', $row["email"]);
        $this->assertEquals('janePassword', $row["password"]);
    }    
    
}
