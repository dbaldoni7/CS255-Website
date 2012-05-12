<?php
class Login extends CI_Controller {
		
		
	public function userLogin(){
		$this->load->model('Model');
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
				$userID = $row->userID;
				$name = $row->name;
				$admin = $row->admin;
				$this->session->set_userdata('logged_in', TRUE);
				$this->session->set_userdata('name', $name);
				$this->session->set_userdata('admin', $admin);
				
				$this->load->view('loggedinheader');
				$this->load->view('profile');
				$this->load->view('footer');
			}
			else{
				$this->load->view('welcome_message');
			}
		}
				
	}
		
		
		
}