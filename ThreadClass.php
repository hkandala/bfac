<?php
require_once './include/php/connect.php';
require_once 'ProjectClass.php';
require_once 'UserClass.php';
class Thread
{
	protected $id;
	protected $label;
	
	function _constructor()
	{
		$id = null;
	}
	function newThread($label)
	{
		$this->label = $label;
	}
	
	function insertThread()
	{
		$GLOBALS['db']->insert('threads','Label',"'$this->label'");
	}
	
	function getProjects()
	{
		//$result = mysql_query("SELECT ProjectId FROM Project_Thread WHERE ThreadId = ".$this->id) or die(mysql_error());
		$result = $GLOBALS['db']->select('ProjectId','project_thread','ThreadId',"$this->id");
		if(result != NULL)
		{	
			$projectArr = array();
			while($row = $result->fetch_assoc())
			{
				$project = new Project;
				$project->getProject($row['ProjectId']);
				array_push($projectArr, $project);
			}
		return $projectArr;
		}
		return null;
	}
	
	function getUsers()
	{
		//$result = mysql_query("SELECT UserId FROM User_Thread WHERE ThreadId = ".$this->id) or die(mysql_error());
		$result = $GLOBALS['db']->select('UserId','user_thread','ThreadId',"$this->id");
		if(result != NULL)
		{
			$userArr = array();
			while($row = $result->fetch_assoc())
			{
				$user = new User;
				$user->getUser($row['UserId']);
				array_push($userArr, $user);
			}
			return $userArr;
		}
		return NULL;
		
	}
	
	function getThreadFromId($threadId)
	{
		//$result = mysql_query("SELECT * FROM Threads WHERE ThreadId = ".$threadId) or die(mysql_error());
		//$row = mysql_fetch_assoc($result);
		
		$result = $GLOBALS['db']->select('*','threads','ThreadId',"$threadId");
		$row = $result->fetch_assoc();
		$this->id = $row['ThreadId'];
		$this->label = $row['Label'];
	}
	
	function getThreadFromLabel($threadLabel)
	{
		//$result = mysql_query("SELECT * FROM Threads WHERE Label = ".$threadLabel) or die(mysql_error());
		//$row = mysql_fetch_assoc($result);
		
		$result = $GLOBALS['db']->select('*','threads','Label',"$threadLabel");
		$row = $result->fetch_assoc();
		$this->id = $row['ThreadId'];
		$this->label = $row['Label'];
		
	}
	
	function getLabel()
	{
		return $this->label;
	}
}
?>