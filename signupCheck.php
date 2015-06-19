<?php
    require_once 'include/php/connect.php';
    require_once 'UserClass.php';
    session_start();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $college = $_POST['college'];
    $branch = $_POST['branch'];
    $phoneno = $_POST['phoneno'];

    $result = $GLOBALS['db']->select('*','users','Email',"$email");
    if($result == NULL) {
	    echo ('Something wrong happened, Please try again');
    } else {
        $no = $result->num_rows;
        if($no != 0) {
            echo ('This email is already registered');
        } else if(($pass != NULL) && ($name != NULL) && ($email != NULL)) {
            $myUser = new User;
            $myUser->newUser($name,$email,$pass,$college,$branch,$phoneno);
            $myUser->insertUser();
            $myUser->getUserFromUserName($email);
            echo ('You have successfully registered');
        } else {
            echo ('Something wrong happened, Please try again');
        }
    }