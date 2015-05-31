<?php
ob_start();
require_once './include/php/connect.php';
require_once 'UserClass.php';
session_start();
?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 6</title>
<style type="text/css">
.auto-style1 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: xx-large;
	text-align: center;
	margin-top:18%;
}
</style>
</head>

<body> -->
<?php
$user = $_POST['email'];
$pass = $_POST['password'];
//$result = mysql_query("SELECT * FROM Users WHERE User='$user' ") or die(mysql_error());
$result = $GLOBALS['db']->select('*','users','Email',"$user");
//$no= mysql_num_rows($result);
if($result != NULL)
{$no = $result->num_rows;

if($no==1)
{
	//$row = mysql_fetch_array($result);
	$row = $result->fetch_assoc();
	if($pass != $row['Pass'])
	{
		header('Location:index.php?loginerror=Invalid password');
	}
	else
	{
		$myUser = new User;
		$myUser->getUserFromUserName($user);
		$_SESSION['curUser'] = $myUser->id;
		header('Location:desking.php');
		
	}
}
else if($no == 0)
{
	
	header('Location:index.php?loginerror=Username does not exist');
}}
else
{
	header('Location:desking.php');
}
ob_end_flush();
?>
<!-- </body>

</html>
 -->