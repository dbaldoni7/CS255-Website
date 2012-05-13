<?php
class Login extends CI_Controller {

	public function userLogin(){
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
			
		if($this->form_validation->run() == FALSE){
			
			$this->load->view('welcome_message');
		}
		else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			$row = $this->Model->getUser($email, $password);
			if($row){
				//login
				$this->setUserSession($row);
				$admin = $row->admin;
				
				if($admin == 0)
				{
					$bio = $row->bio;
					$gradyear = $row->gradyear;
					$this->session->set_userdata('bio', $bio);
					$this->session->set_userdata('gradyear', $gradyear);
					redirect('loggedinathlete/profile');
				}
				
				else if($admin == 1)
				{
					redirect('loggedinathlete/profile');				
				}
			}
			else{
				$this->load->view('welcome_message');
			}
		}
				
	}
		
	public function setUserSession($row){
		
		$userID = $row->userID;
		$name = $row->name;
		$admin = $row->admin;
		$teamID = $row->teamID;
		
		$team_row = $this->Model->getTeamData($teamID);
		
		$school = $team_row->school;
		$sport = $team_row->sport;
		
		$this->session->set_userdata('logged_in', TRUE);
		$this->session->set_userdata('name', $name);
		$this->session->set_userdata('admin', $admin);
		$this->session->set_userdata('userID', $userID);
		$this->session->set_userdata('teamID', $teamID);
		$this->session->set_userdata('school', $school);
		$this->session->set_userdata('sport', $sport);
	}
		
}