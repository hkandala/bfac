<?php
require_once 'UserClass.php';
require_once 'ThreadClass.php';
require_once 'ProjectClass.php';
class projectPost
{
	function insertPost($UserId,$Heading,$projectId)
	{
		$time=time();
		$GLOBALS['db']->insert('posts','UserId, ProjectId, Heading, Date, CommentCount',"'$UserId', '$projectId', '$Heading', '$time' , '0'");
	}
	function deletePost($id)
	{
		$GLOBALS['db']->delete('posts','Id',"$id");
	}
	function getPosts($projectId)
	{
		$result = $GLOBALS['db']->raw("Select * from posts where ProjectId='$projectId'");
		$htmlContent='';
		if($result !=false && $result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{		
			$htmlContent .= "<button onclick=\"postClick(".$row["Id"].")\">Post :".$row["Heading"]."</button><br>";
			}
		}
		return $htmlContent;
	}
	
}
?>