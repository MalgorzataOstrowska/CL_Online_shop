<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConnectionTest
 *
 * @author gosia
 */
class ConnectionTest  extends PHPUnit_Extensions_Database_TestCase
{
    protected function getConnection()
    {
        $conn = new PDO(
                $GLOBALS['DB_DNS'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWORD']
        );
        return new PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection($conn, $GLOBALS['DB_DBNAME']);
    }
    
    protected function getDataSet()
    {
        return $this->createMySQLXMLDataSet('cl_online_shop_Test.xml');
        
/*******************************************************************************
creating a xml file in the terminal:
    mysqldump --xml -t -u [username] -p [database]          > file.xml
    mysqldump --xml    -u root       -p cl_online_shop_Test > cl_online_shop_Test.xml

in phpunit.xml
    <var name="DB_DNS" value="mysql:dbname=cl_online_shop_Test;host=localhost" />
    ...
    <var name="DB_DBNAME" value="cl_online_shop_Test" />
*******************************************************************************/
    }
    
    public function testCosTam()
    {
        $this->assertTrue(true);
    }
    
}
