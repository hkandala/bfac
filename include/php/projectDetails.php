<?php
require_once 'UserClass.php';
require_once 'ThreadClass.php';
require_once 'ProjectClass.php';
require_once 'postClass.php';

session_start();
if(!isset($_SESSION['curUser']))
{
	header("Location index.php");
}
$curUser = $_SESSION['curUser'];

$userId = $curUser->id;
print_r($curUser);
$postVariable = new projectPost;
if(isset($_GET["id"]))
{
	echo "<div>";
	$project = new Project($_GET["id"]);
	$project->getProject($_GET["id"]);
	
	echo "<input type='button' value='Go Back' onclick='loadMyProjects()'><br>";
	echo "<h1>".$project->getTitle()."</h1></div>";
	$threads[] = new Thread;
	$threads = $project->getThreads();
	//@# Thread Count has to be rectified
			if(count($threads)>0)
			{
				foreach($threads as $thread)
				{
					$name = $thread->getLabel();
					if($name != null)
					{
						echo "<span>".$name."</span>&nbsp&nbsp";
					}
				}
				echo "<br>";
			}
	echo "<br><br><br>Posts :<br><br>";
	echo"<div id='post-content'>".$postVariable->getPosts($_GET['id'])."</div>";
	echo "<br><br>";
	echo "<input type=\"text\" id=\"newpost-text\"><button id=\"project-main-button\" onclick=\"addPost()\" projectid=\"".$_GET["id"]."\">Create New Post</button>";
}