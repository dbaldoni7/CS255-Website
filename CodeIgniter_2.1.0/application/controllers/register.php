<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function registercoach()
	{
		$this->load->view('header');
		$this->load->view('registercoach');
		$this->load->view('footer');
	}
	
	public function registerathlete()
	{
		$this->load->view('header');
		$this->load->view('registerathlete');
		$this->load->view('footer');
	}
	
	public function registerNewCoach(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('firstname', 'first name', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('lastname', 'last name', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('confirmpw', 'confirm password', 'trim|required|matches[password]|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean|callback_doesUserExist');
		$this->form_validation->set_rules('sport', 'sport', 'trim|required|xss_clean');
		$this->form_validation->set_rules('school', 'school', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			
			$this->registercoach();
		}
		else{
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$name = "$firstname" . "$lastname";
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$school = $this->input->post('school');
			$sport = $this->input->post('sport');
			$invitelist = $this->input->post('invitelist');
			
			$this->load->model('Model');
			if($this->Model->registerCoach($name, $email, $password, $school, $sport)){
				echo "Coach Registered Successfully";
			}
			$this->sendInviteEmails($invitelist);
			
			
		}
	
	}

	public function sendInviteEmails($inviteEmails){
		
	}
	
	public function doesUserExist($email){
		$this->form_validation->set_message("doesUserExist", "This email address already exists.");
		
		$this->load->model('Model');
		if($this->Model->doesUserExist($email)){
			return FALSE;
		}
		else return TRUE;
	}
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */