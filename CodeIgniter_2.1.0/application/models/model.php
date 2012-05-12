<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model{
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function getUser($email, $password){
		$sha_pass = sha1($password);
		$result = $this->db->query("select * from Users where email = '$email' and password = '$sha_pass'");
		if ($result->num_rows() == 1){
			return $result->row(0);
		}
		else return FALSE; 
	}

	public function registerCoach($name, $email, $password, $school, $sport){
		$teamID = $this->registerTeam($school, $sport);
		
		$sha1_pass = sha1($password);
		
		$queryStr = "insert into Users (email, password, name, teamID, admin) values (?, ?, ?, ?, ?)";
		if($this->db->query($queryStr, array($email,$sha1_pass, $name, $teamID, 1))){
			return $teamID;
		}
		else return 0;
	}
	
	public function registerAthlete($teamID, $name, $email, $password, $gradyear, $bio){		
		$sha1_pass = sha1($password);
		
		$queryStr = "insert into Users (email, password, name, teamID, admin, gradyear, bio) values (?, ?, ?, ?, ?, ?, ?)";
		if($this->db->query($queryStr, array($email, $sha1_pass, $name, $teamID, 0, $gradyear, $bio))){
			return TRUE;
		}
		else return FALSE;
	}
	
	public function registerTeam($school, $sport){
		$queryStr = "insert into Team (school, sport) values (?, ?)";
		if($this->db->query($queryStr, array($school, $sport))){
			//return team ID that is created
			$queryStr = "select teamID from Team where school = '$school' and sport = '$sport'";
			$query = $this->db->query($queryStr);
			$row = $query->row();
			return $row->teamID;
		}
		else return 0; 
	}
	
	public function doesUserExist($email){
		$queryStr = "select * from Users where email = '$email'";
		$query = $this->db->query($queryStr);
		if($query->num_rows() > 0){
			return TRUE;
		}
		else return FALSE;
	}
}
