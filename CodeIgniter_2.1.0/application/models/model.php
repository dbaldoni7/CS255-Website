<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model{
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function getUser($email){
		$query = $this->db->query('SELECT * FROM Users where email = \'$email\'');
		if ($query->num_rows() > 0){
			return $query->result();
		}
		else return NULL; 
	}

	public function registerCoach($name, $email, $password, $school, $sport){
		$teamID = $this->registerTeam($school, $sport);
		
		$sha1_pass = sha1($password);
		
		$queryStr = "insert into Users (email, password, name, teamID, admin) values (?, ?, ?, ?, ?)";
		if($this->db->query($queryStr, array($email,$sha1_pass, $name, $teamID, 1))){
			return TRUE;
		}
		else return FALSE;
	}
	
	public function registerAthlete($teamID, $name, $email, $password, $gradyear, $bio){		
		$sha1_pass = sha1($password);
		
		$queryStr = "insert into Users (email, password, name, teamID, admin) values (?, ?, ?, ?, ?)";
		if($this->db->query($queryStr, array($email,$sha1_pass, $name, $teamID, 1))){
			return TRUE;
		}
		else return FALSE;
	}
	
	
	
	public function registerTeam($school, $sport){
		$queryStr = "insert into Team (school, sport) values (?, ?)";
		if($this->db->query($queryStr, array($school, $sport))){
			//return team ID that is created
			$queryStr = "select teamID where school = '$school' and where sport = '$sport'";
			
			return 1;
		}
		else return 0; 
	}
}
