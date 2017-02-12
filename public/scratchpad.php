<?php

include_once './../vendor/autoload.php';
$config = require_once  __DIR__ . './../conf/configuration.php'; 

$conection = new Connection($config);

$mysqli = new mysqli('localhost', 'root', 'coderslab', 'cl_online_shop');
echo $sql  = 'SELECT `id`, `firstName`, `lastName`, `email`, `password` FROM `user` WHERE `id`=1';
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
echo $row["id"];
echo $row["firstName"];
var_dump($result);