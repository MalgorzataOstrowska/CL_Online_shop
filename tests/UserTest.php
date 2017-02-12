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
        $this->id = -1;
        $this->firstName = '';
        $this->lastName = '';
        $this->email = '';
        $this->password = '';
        $this->user = new User();
        
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
    public function testGetId()
    {
        $this->assertEquals($this->id,$this->user->getId());
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
    
// testSet:     
    public function testSetId()
    {
        $this->user->setId(1);
        $this->assertEquals(1,$this->user->getId());
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
        $this->user->setPassword('gosiaPassword');
        $this->assertEquals('gosiaPassword',$this->user->getPassword());
    }  
    
 //testConstruct:      
    public function testConstruct()
    {
        $this->assertEquals(-1,$this->user->getId());
        $this->assertEquals('',$this->user->getFirstName());
        $this->assertEquals('',$this->user->getLastName());
        $this->assertEquals('',$this->user->getEmail());
        $this->assertEquals('',$this->user->getPassword());
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

    public function testSaveToDB_savePart()
    {
        $this->user->setFirstName('Małgorzata_to_improve');
        $this->user->setLastName('Ostrowska_to_improve');
        $this->user->setEmail('gosia@gmail.com_to_improve');
        $this->user->setPassword('gosiaPassword_to_improve');
        
        $this->assertTrue($this->user->saveToDB($this->connection));

        $id = 2;
        $row = $this->user->loadUserById($this->connection, $id);
        
        $this->assertEquals(2, $row["id"]);
        $this->assertEquals('Małgorzata_to_improve', $row["firstName"]);
        $this->assertEquals('Ostrowska_to_improve', $row["lastName"]);
        $this->assertEquals('gosia@gmail.com_to_improve', $row["email"]);
        $this->assertEquals('gosiaPassword_to_improve', $row["password"]);
    }
    public function testSaveToDB_updatePart()
    {    
        $this->user->setId(2);
        $this->user->setFirstName('Małgorzata');
        $this->user->setLastName('Ostrowska');
        $this->user->setEmail('gosia@gmail.com');
        $this->user->setPassword('gosiaPassword');
        
        $this->assertTrue($this->user->saveToDB($this->connection));    
        
        $id = 2;
        $row = $this->user->loadUserById($this->connection, $id);
        
        $this->assertEquals(2, $row["id"]);
        $this->assertEquals('Małgorzata', $row["firstName"]);
        $this->assertEquals('Ostrowska', $row["lastName"]);
        $this->assertEquals('gosia@gmail.com', $row["email"]);
        $this->assertEquals('gosiaPassword', $row["password"]);
    }
}
