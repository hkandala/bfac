<?php 
class ProjectComment
{
	function insertComment($UserId,$PostId,$Comment)
	{
		$time=time();
		$GLOBALS['db']->insert('comments','UserId, PostId, Date, Comment',"'$UserId', '$PostId', '$time', '$Comment'");
	}
	function deleteComment($comment_id)
	{
		$GLOBALS['db']->delete('comments','Id',"$comment_id");
	}
	function getComments($id)
	{
		$user_comment = new User;
		$result = $GLOBALS['db']->raw("Select * from comments where PostId='$id' ORDER BY Date");
		$htmlContent='';
		if($result !=false && $result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{	
			$user_comment->getUser($row["UserId"]);	
			$htmlContent .= "<br><div>".$row["Comment"]."Submitted By".$user_comment->getName()."</div><br>";
			}
		}
		return $htmlContent;
	}
	function showAddCommentOption($id)
	{
		$htmlContent="<input type=\"text\" id=\"newcomment-text\"><button id=\"comment-main-button\" onclick=\"addComment()\" postid=\"".$id."\">Add Comment</button>";
		return $htmlContent;
	}
}
?>