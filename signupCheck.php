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

//$user = $_POST['User'];

//$result = mysql_query("SELECT * FROM Users WHERE Email = '$mail' ") or die(mysql_error());
//$no = mysql_numrows($result);

$result = $GLOBALS['db']->select('*','users','Email',"$email");
if($result == NULL)
{
	header('Location:index.php');
}
$no = $result->num_rows;
if($no != 0)
{
	$_SESSION['error']='email';
	header('Location:index.php');
}
else if(/*($user != NULL) && */($pass != NULL) && ($name != NULL) && ($email != NULL))
{
	$myUser = new User;
	$myUser->newUser($name,$email,$pass,$college,$branch,$phoneno);
	$myUser->insertUser();
	$myUser->getUserFromUserName($email);
	// $_SESSION['curUser'] = $myUser->id;
	$_SESSION['success']='true';
	header('Location:index.php');
}
else
{
	header('Location:index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<head>
	<title>Registration Successfull</title>
	<style type="text/css">
	.auto-style2 {
		text-align: center;
	}
	</style>
</head>

<body style="background-color: #C0C0C0">

	<p class="auto-style2">Success</p>

</body>
</html>

