<?php
    require_once 'UserClass.php';
    session_start();
    if(!isset($_SESSION['curUser'])) {
	    header("Location: index.php");
    }
    $curUserId = $_SESSION['curUser'];
    $curUser = new User;
    $curUser->getUser($curUserId);
