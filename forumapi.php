<?php
if(isset($_GET['challengeId'],$_GET['mode']))
{
	if($_GET['mode']== 'add_comment' && isset($_GET['comment']))
	{
		echo " Adding COmment for CHallenge :".$_GET['challengeId']." Comment is :".$_GET['comment'];
	}
	else if($_GET['mode']== 'delete_comment' && isset($_GET['commentId']))
	{
		echo " Deleting COmment for CHallenge :".$_GET['challengeId']." Comment is :".$_GET['commentId'];
	}
}
else if(isset($_GET['challengeId']))
{
	echo " Viewing COmments";
}
?>