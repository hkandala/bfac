<?php
require_once 'include/php/connect.php';
$term = trim(strip_tags($_REQUEST['term']));
$result = $GLOBALS['db']->raw("SELECT Name,Email FROM users WHERE Name LIKE '%".$term."%'");
$return_arr = array();
while($rows = $result->fetch_assoc())
{
		$rowset['label']=$rows['Name']." (".$rows['Email'].")";
		array_push($return_arr,$rowset);
}
echo json_encode($return_arr);
flush();
?>