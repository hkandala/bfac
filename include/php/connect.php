<?php
    require_once 'DbObjectClass.php';
    $host = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'bfac';
    $db = new DbObject($host, $userName, $password, $dbName);
    $db->connect();