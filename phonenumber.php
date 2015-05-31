<?php
require_once 'include/php/connect.php';
$result=$GLOBALS['db']->raw('Select Name,Phoneno from users LIMIT 40');
$BigArray= array();
while($row = $result->fetch_assoc())
{
	$temp=array();
	$temp['name']=$row['Name'];
	$temp['phone']=$row['Phoneno'];
	array_push($BigArray, $temp);
}
echo json_encode($BigArray);
?>