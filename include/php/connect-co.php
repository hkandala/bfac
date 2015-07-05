<?php
    require_once 'DbObjectClass.php';
    $host = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'bfac';
    $db = new DbObject($host, $userName, $password, $dbName);
    $db->connect();
    $db->raw("UPDATE hits SET count=count+1");
