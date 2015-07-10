<?php
class DbObject {
    var $db;
	var $host;
	var $user;
	var $pass;
	var $dbname;

	function __construct($host,$user,$pass,$dbname) {
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->dbname = $dbname;
	}
	
	function connect() {
		$this->db = new mysqli("$this->host","$this->user","$this->pass","$this->dbname");
		if(mysqli_connect_errno())
		{
			echo 'Error: Could not connect to DB';
			exit;
		}
		
	}
	
	function selectDB($dbname) {
		$this->dbname = $dbname;
		$this->db->select_db($dbname);
	}
	
	function convert($param) {
		if(sizeof($param) == 1)  {
			$result = $param;
		} else {
			$result = join("',",$param);
		}

		return $result;
	}

	function select($what, $table, $key, $value) {
		$values = $this->convert($value);
		$whats = $this->convert($what);
		$tables = $this->convert($table);
		
		$query = "SELECT ".$whats." FROM ".$tables." WHERE ".$key." IN ('".$values."')";
		$result = $this->db->query($query);
		return $result;
	}

	function delete($table, $key, $value) {
		$values = $this->convert($value);
		
		$query = "DELETE FROM ".$table." WHERE ".$key." IN (".$values.")";
        echo $query;
		$result = $this->db->query($query);
		return $result;
	}

	function insert($table, $key, $value) {
		if(sizeof($key) != sizeof($value)) {
			$result = null;
		} else {
			$values = $this->convert($value);
			$keys = $this->convert($key);
			
			$query = "INSERT INTO ".$table." (".$keys.") VALUES (".$values.")";
			$result = $this->db->query($query);
		}

		return $result;
	}
	
	function raw($query) {
		$result = $this->db->query($query);
		return $result;
	}

    function affected_rows () {
        $result = $this->db->affected_rows;
        return $result;
    }
}