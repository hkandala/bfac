<?php
require_once 'include/php/connect.php';
$result=$GLOBALS['db']->raw('Select Name,Phoneno from users');
$i=1;
while($row = $result->fetch_assoc())
{
	echo "<br>".$i." Name: ".$row['Name'];
	echo "  Phone Number: ".$row['Phoneno']."<br>";
	$i++;
}
?>