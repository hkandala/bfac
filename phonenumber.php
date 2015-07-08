<?php
    require_once 'include/php/connect.php';
    $result=$GLOBALS['db']->raw('Select Name,Phoneno from users');
    $i=1;
    while($row = $result->fetch_assoc()) {
        echo $i . ") Name: " . $row['Name'];
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone Number: ".$row['Phoneno'] . "<br>";
        $i++;
    }