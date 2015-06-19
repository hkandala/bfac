<?php
    require_once 'DbObjectClass.php';
    $host = 'localhost';
    $userName = 'ieee_makeathon';
    $password = 'sodamm1234';
    $dbName = 'ieee_makeathon';
    $db = new DbObject($host, $userName, $password, $dbName);
    $db->connect();
    $db->raw("UPDATE hits SET count=count+1");
