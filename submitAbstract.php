<?php
require_once 'include/php/connect.php';
require_once 'ProjectClass.php';
require 'sessionCheck.php';
session_regenerate_id();

if(isset($_POST['title']) && isset($_POST['abstract']) && isset($_POST['whymak']) && !empty($_POST['title']) && !empty($_POST['abstract']) && !empty($_POST['whymak'])) {
	$title = $_POST['title'];
	$abstract = $_POST['abstract'];
	$requirement = $_POST['requirement'];
	$whymak = $_POST['whymak'];
	$challengeId = $_POST['challenge'];
	$tags = $_POST['tag'];
	$emails= array();
	foreach ($tags as $key) {
        $temp = explode('(', $key);
        $temp_ex = explode(')', $temp[1]);
				//$temp_ex = $key;
				print_r($temp_ex[0]);
				echo"</br>";

        if($curUser->email != $temp_ex[0] && $GLOBALS['db']->select('*','users','Email',"$temp_ex[0]") && $temp_ex[0] != '')
		    array_push($emails, $temp_ex[0]);
	}
	echo "Emails - ";print_r($emails);echo "</br>";//delete later
	if(isset($_POST['id'])) {
		$project = new Project($_POST['id']);
		$project->newProject($title, $challengeId, $abstract, $requirement, $whymak);
		$project->updateProject();
	} else {
		$project = new Project(session_id());
		$project->newProject($title, $challengeId, $abstract, $requirement, $whymak);
		$project->insertProject();
		$curUser->addProject(session_id(),0);
		foreach ($emails as $emailid) {
			$member = new User;
			$member->getUserFromUserName($emailid);
			$member->addProject(session_id(),1);
		}
	}
}
