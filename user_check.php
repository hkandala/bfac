<?php
require_once 'include/php/connect.php';

$user = $_GET["User"];

//$result = mysql_query("SELECT * FROM Users WHERE User = '$user' ") or die(mysql_error());
//$no = mysql_numrows($result);

$result = $GLOBALS['db']->select('*','users','User',"$user");
$no = $result->num_rows;
if($no != 0)
{

echo "Username already exists";
}
else
{
echo "";
}
?>


