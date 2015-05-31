<?php
require_once 'include/php/connect.php';
require_once 'ProjectClass.php';
require 'sessionCheck.php';
session_regenerate_id();
if(isset($_POST['title']) && isset($_POST['abstract']) && isset($_POST['whymak']) && !empty($_POST['title']) && !empty($_POST['abstract']) && !empty($_POST['whymak']))
{
	$title = $_POST['title'];
	$abstract = $_POST['abstract'];
	$requirement = $_POST['requirement'];
	$whymak = $_POST['whymak'];
	$challengeId = $_POST['challenge'];
	$tags = $_POST['tag'];

	$emails= array();
	//print_r($tags);
	foreach ($tags as $key)

{               print_r($tags);
		print_r($key);
                $temp = explode('(', $key);

                $temp_ex = explode(')', $temp[1]);
		$temp_ex = $key;
                if($curUser->email != $temp_ex && $GLOBALS['db']->select('*','users','Email',"$temp_ex") && $temp_ex != '')
		array_push($emails, $temp_ex);
		//print_r($emails);
	}
	if(isset($_POST['id']))
	{
		$project = new Project($_POST['id']);
		$project->newProject($title, $challengeId, $abstract, $requirement, $whymak);
		$project->updateProject();

	}

	else
	{
		$project = new Project(session_id());
		$project->newProject($title, $challengeId, $abstract, $requirement, $whymak);
		$project->insertProject();
		$curUser->addProject(session_id(),0);
		foreach ($emails as $emailid)
		{
			$member = new User;
			$member->getUserFromUserName($emailid);
			print_r($member);
			$member->addProject(session_id(),1);
		}
	}

	 // 0 stands for Leader
	//header('Location:desking.php');

}


?>