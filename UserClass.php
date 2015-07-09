<?php
require_once 'include/php/connect.php';
require_once 'ProjectClass.php';

class User {
	public $id;
	public $name;
	public $email;
	protected $pass;
	protected $status;
	public $college;
	public $branch;
	public $phoneno;
	
	
	function _constructor() {
		$id = null;
	}

    function copyUser($a) {
		$this->id = $a->id;
		$this->name = $a->name;
		$this->email = $a->email;
		$this->pass = $a->pass;
	}

    function newUser( $name, $email, $pass , $college , $branch , $phoneno) {
		$this->name = $name;
		$this->email = $email;
		$this->pass = $pass;
		$this->college = $college;
		$this->branch = $branch;
		$this->phoneno = $phoneno;
	}

	function updateStatus($no) {
		$this->status = $no;
	}
	
	function addProject($projectId, $status) {
		$GLOBALS['db']->insert('user_project','UserId, ProjectId, Status',"$this->id, '$projectId', $status");
	}
	
	function getProjectIds() {
		$result = $GLOBALS['db']->raw("SELECT ProjectId FROM user_project WHERE UserId='$this->id' ");
		$projectIdArr = array();
		while($row = $result->fetch_assoc()) {
			array_push($projectIdArr, $row['ProjectId']);
		}
		return $projectIdArr;
	}

    function deleteUserFromProject($projectId) {
        $query = "DELETE FROM user_project WHERE UserId='$this->id' AND ProjectId='$projectId'";
        $GLOBALS['db']->raw($query);
    }

	function deleteProject($projectId) {
		$GLOBALS['db']->delete('user_project','ProjectId',"'$projectId'");
	}

	function addInterest($threadId) {
		$GLOBALS['db']->insert('user_thread','UserId, ThreadId',"'$this->id', '$threadId'");
	}	
	
	function deleteInterest($threadId) {
		$GLOBALS['db']->delete('user_thread','ThreadId',"'$threadId'");
	}
	
	function getInterests() {
		$result = $GLOBALS['db']->select('ThreadId','user_thread','UserId',"$this->id");
		$threadArr = array();
		while($row = $result->fetch_assoc())
		{
			$thread = new Thread;
			$thread->getThread($row['ThreadId']);
			array_push($threadArr, $thread);
		}
		return $threadArr;
	}	
	
	function insertUser() {
		$GLOBALS['db']->insert('users','Name, Email, Pass , College , Branch , Phoneno',"'$this->name', '$this->email', '$this->pass', '$this->college', '$this->branch' , '$this->phoneno'");
		
	}
	
	function getUserFromUserName($user) {
		$result = $GLOBALS['db']->select('*','users','Email',$user);
		$row = $result->fetch_assoc();
		$this->id = $row['UserId'];
		$this->name = $row['Name'];
		$this->email = $row['Email'];
		$this->college = $row['College'];
		$this->branch = $row['Branch'];
		$this->phoneno = $row['Phoneno'];
	}
	
	function getUser($userId) {
		$result = $GLOBALS['db']->select('*','users','UserId',$userId);
		$row = $result->fetch_assoc();
		
		$this->id = $row['UserId'];
		$this->name = $row['Name'];
		$this->email = $row['Email'];
		$this->college = $row['College'];
		$this->branch = $row['Branch'];
		$this->phoneno = $row['Phoneno'];
	}

	function getName() {
		return $this->name;
	}
}