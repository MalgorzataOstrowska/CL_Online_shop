<?php

include_once './../vendor/autoload.php';
$config = require_once  __DIR__ . './../conf/configuration.php'; 

$conection = new Connection($config);
