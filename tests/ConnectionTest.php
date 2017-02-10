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
    protected function getConnection() { //26
        $conn = new PDO(
                $GLOBALS['DB_DNS'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWORD']
        );
        return new PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection($conn, $GLOBALS['DB_DBNAME']);
    }
    protected function getDataSet() { //26
        return $this->createMySQLXMLDataSet('file.xml');
    }
    
    public function testCosTam()
    {
        $this->assertTrue(true);
    }
    
}
