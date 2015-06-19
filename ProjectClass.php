<?php
require_once './include/php/connect.php';
require_once 'ThreadClass.php';
class Project
{
	protected $id;
	public $status;
	public $challengeId;
	public $title;
	public $abstract;
	public $requirement;
	public $whymak;


	function __construct($id)
	{
		$this->id = $id;
		$this->status = 0;
	}

	function newProject($title,$challengeId, $abstract,$requirement,$whymak)
	{
		$this->challengeId = $challengeId;
		$this->title = $title;
		$this->abstract = $abstract;
		$this->requirement = $requirement;
		$this->whymak = $whymak;
	}

	function insertProject()
	{
		$GLOBALS['db']->insert('projects','ProjectId, Title, ChallengeId, Abstract, Status, WhyMakeathon, Requirement',"'$this->id', '$this->title', $this->challengeId, '$this->abstract', $this->status, '$this->whymak', '$this->requirement'");
	}

	function deleteProject()
	{
		$GLOBALS['db']->delete('projects','ProjectId',"$this->id");
	}

	function updateProject()
	{
		$query="UPDATE projects SET Title='".$this->title."', ChallengeId=".$this->challengeId.", Abstract='".$this->abstract."', Status=".$this->status.", WhyMakeathon='".$this->whymak."', Requirement='".$this->requirement."' WHERE ProjectId='".$this->id."'";
		$GLOBALS['db']->raw($query);
	}
	function getProject($proId)
	{
		$result = $GLOBALS['db']->select('*','projects','ProjectId',"$proId");
		$row = $result->fetch_assoc();
		$this->id = $row['ProjectId'];
		$this->title = $row['Title'];
		$this->challengeId = $row['ChallengeId'];
		$this->abstract = $row['Abstract'];
		$this->status = $row['Status'];
		$this->requirement = $row['Requirement'];
		$this->whymak = $row['WhyMakeathon'];
	}
	function getTeamAdmin($proId,$id)
	{
		$result = $GLOBALS['db']->raw("select * from user_project where ProjectId='$proId' AND UserId='$id'");
		$row = $result->fetch_assoc();
		return $row;
	}
	/*
	function addThread($threadId)
	{
		$GLOBALS['db']->insert('project_thread','ProjectId, ThreadId',"'$this->id', '$threadId'");

	}

	function getThreads()
	{
		$result = $GLOBALS['db']->select('ThreadId','project_thread','ProjectId',"$this->id");
		$threadArr[] = new Thread();
		while($row = $result->fetch_assoc())
		{
			$thread = new Thread;
			$thread->getThreadFromId($row['ThreadId']);
			array_push($threadArr, $thread);
		}
		return $threadArr;
	}

	function deleteThread($threadId)
	{
		$GLOBALS['db']->delete('project_thread','ThreadId',"$threadId");
	}
	*/

	function getId()
	{
		return $this->id;
	}


}