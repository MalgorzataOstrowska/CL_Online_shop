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
    
    public function testSetEmailTrue()
    {
        $this->user->setEmail('gosia@gmail.com');
        $this->assertTrue('gosia@gmail.com' === $this->user->getEmail());
    }  
    
    public function testSetEmailFalse()
    {
        $this->user->setEmail('gosia.gmail.com');
        $this->assertFalse('gosia.gmail.com' === $this->user->getEmail());
    }  
    
    public function testSetPassword()
    {
        $password = 'gosiaPassword';
        $this->user->setPassword($password);
        $this->assertTrue(password_verify($password, $this->user->getPassword()));
    }  
    
// testConstruct:      
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
        $this->assertTrue(password_verify('janePassword', $row["password"]));
    }    
    
    public function testLoadAllUsers()
    {
        $allUsers = $this->user->loadAllUsers($this->connection);
        
        $this->assertEquals(1, $allUsers[0]->getId());
        $this->assertEquals('Jane', $allUsers[0]->getFirstName());
        $this->assertEquals('Doe', $allUsers[0]->getLastName());
        $this->assertEquals('jane.doe@gmail.com', $allUsers[0]->getEmail());
        $this->assertTrue(password_verify('janePassword', $allUsers[0]->getPassword()));          
        
        $this->assertEquals(2, $allUsers[1]->getId());
        $this->assertEquals('John', $allUsers[1]->getFirstName());
        $this->assertEquals('Smith', $allUsers[1]->getLastName());
        $this->assertEquals('john.smith@gmail.com', $allUsers[1]->getEmail());
        $this->assertTrue(password_verify('johnPassword', $allUsers[1]->getPassword()));          
    }
    
    public function testSaveToDB_savePart()
    {
        $this->user->setFirstName('Małgorzata_to_improve');
        $this->user->setLastName('Ostrowska_to_improve');
        $this->user->setEmail('gosia_to_improve@gmail.com');
        $this->user->setPassword('gosiaPassword_to_improve');
        
        $this->assertTrue($this->user->saveToDB($this->connection));
        $id = $this->connection->mysqli->insert_id;
        $row = $this->user->loadUserById($this->connection, $id);
        
        $this->assertEquals($id, $row["id"]);
        $this->assertEquals('Małgorzata_to_improve', $row["firstName"]);
        $this->assertEquals('Ostrowska_to_improve', $row["lastName"]);
        $this->assertEquals('gosia_to_improve@gmail.com', $row["email"]);
        $this->assertTrue(password_verify('gosiaPassword_to_improve',  $this->user->getPassword()));
    }
    
    public function testSaveToDB_updatePart()
    {   
        $id = 3;
        
        $this->user->setId($id);
        $this->user->setFirstName('Małgorzata');
        $this->user->setLastName('Ostrowska');
        $this->user->setEmail('gosia@gmail.com');
        $this->user->setPassword('janePassword');
        
        $this->assertTrue($this->user->saveToDB($this->connection));    
        
        $row = $this->user->loadUserById($this->connection, $id);
        
        $this->assertEquals($id, $row["id"]);
        $this->assertEquals('Małgorzata', $row["firstName"]);
        $this->assertEquals('Ostrowska', $row["lastName"]);
        $this->assertEquals('gosia@gmail.com', $row["email"]);
        $this->assertTrue(password_verify('janePassword',  $this->user->getPassword()));        
    }

    public function testDeleteByIdTrue()
    {
        $id = 3;
        $this->assertTrue($this->user->deleteById($this->connection,$id));
    }
    
    public function testDeleteByIdFalse()
    {
        $id = 100;
        $this->assertFalse($this->user->deleteById($this->connection,$id));
    }

    
//    public function testSaveToDB_False()
//    {
//        $this->user->setFirstName('');
//        $this->user->setLastName('Ostrowska');
//        $this->user->setEmail('gosia2@gmail.com');
//        $this->user->setPassword('gosiaPassword');
//        
//        $this->assertFalse($this->user->saveToDB($this->connection));
//    }    

    public function providerSaveToDB_False()
    {
        return[
            [null,        'Ostrowska', 'gosia2@gmail.com', 'gosiaPassword'],
            ['Małgorzata', null,       'gosia2@gmail.com', 'gosiaPassword'],
            ['Małgorzata','Ostrowska',  null,              'gosiaPassword'],
            ['Małgorzata','Ostrowska', 'gosia2@gmail.com',  null          ],
        ];
    }
    /**
     * @dataProvider providerSaveToDB_False
     */ 
    public function testSaveToDB_False($provided)
    {
        $this->user->setFirstName($provided[0]);
        $this->user->setLastName($provided[1]);
        $this->user->setEmail($provided[2]);
        $this->user->setPassword($provided[3]);
        $this->assertFalse($this->user->saveToDB($this->connection));
    }  
    
    public function testSignUp()
    {
        $firstName = 'Małgorzata_SignUp';
        $lastName = 'Ostrowska_SignUp';
        $email = 'gosia_SignUp@gmail.com';
        $password = 'gosiaPassword_SignUp';
        
        $this->assertTrue($this->user->signUp($this->connection, $firstName, $lastName, $email, $password));
    } 
    
    public function testLogIn()
    {
        $firstName = 'Małgorzata_LogIn';
        $lastName = 'Ostrowska_LogIn';
        $email = 'gosia_LogIn@gmail.com';
        $password = 'gosiaPassword_LogIn';
        $this->user->signUp($this->connection, $firstName, $lastName, $email, $password);
        
        $this->assertTrue($this->user->logIn($this->connection, $email, $password));
    }  

}
