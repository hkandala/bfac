<?php
session_start();
require_once 'postClass.php';
require_once 'CommentClass.php';
require_once 'UserClass.php';
require_once 'ThreadClass.php';
require_once 'ProjectClass.php';


if(!isset($_SESSION['curUser']) || empty($_SESSION['curUser']))
{
	header("Location:index.php");
}
else
{
	$curUserId = $_SESSION['curUser'];
    $curUser = new User;
    $curUser->getUser($curUserId);
	$postVariable = new projectPost;
	$commentVariable = new ProjectComment;
	if(isset($_GET["addPost"])&&isset($_GET["heading"])&&isset($_GET["id"]))
	{
		if($_GET["addPost"]=='true')
		{
			$postVariable->insertPost($curUser->id,$_GET["heading"],$_GET["id"]);
			echo $postVariable->getPosts($_GET["id"]);
		}
	}
	else if(isset($_GET["viewPost"])&&isset($_GET["id"]))
	{
		if($_GET["viewPost"]=='true')
		{
			print_r("Test");
			echo "Before Get comments";
			echo $commentVariable->getComments($_GET["id"]);
			echo "Before Options";
			echo $commentVariable->showAddCommentOption($_GET["id"]);
			echo "After Options";

		}
	}
	else if(isset($_GET["addComment"])&&isset($_GET["comment"])&&isset($_GET["id"]))
	{
		if($_GET["addComment"]=='true')
		{
			echo "Before Get comments - 2";
			$commentVariable->insertComment($curUser->id,$_GET["id"],$_GET["comment"]);
			echo $commentVariable->getComments($_GET["id"]);
			echo $commentVariable->showAddCommentOption($_GET["id"]);

		}
	}
}

?>