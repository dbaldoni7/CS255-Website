<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loggedinathlete extends CI_Controller {
	
	public function validateLogin(){
		$this->load->model('Model');
		$email = $this->input->post('email');
		$user = $this->Model->getUser($email);
		 if (isset($user)){
		 	echo $user;
		 	$password = $user->password;
			$entered = $this->input->post(password);
			
			if($password == sha1($entered)){
				$this->profile($user);
			}
			else{
				echo "Not a valid password";
			}
		 }
		 else{
		 	echo "Not a valid email address";
		 }
	}

	public function addnewevent()
	{
		$this->load->view('loggedinheader');
		$this->load->view('addnewevent');
		$this->load->view('footer');
	}
	
	public function profile()

		$this->load->view('loggedinheader');
		$this->load->view('profile');
		$this->load->view('footer');
	}
	
	public function coachprofile()
	{
		$this->load->view('loggedinheader');
		$this->load->view('coachprofile');
		$this->load->view('footer');
	}
	
	public function events()
	{
		$this->load->view('loggedinheader');
		$this->load->view('events');
		$this->load->view('footer');
	}
	
	public function eventresults()
	{
		$this->load->view('loggedinheader');
		$this->load->view('eventresults');
		$this->load->view('footer');
	}
	
	public function addathletes()
	{
		$this->load->view('loggedinheader');
		$this->load->view('addathletes');
		$this->load->view('footer');
	}
	
	public function analysis()
	{
		$this->load->view('loggedinheader');
		$this->load->view('analysis');
		$this->load->view('footer');
	}
	
	public function weighttraining()
	{
		$this->load->view('loggedinheader');
		$this->load->view('weighttraining');
		$this->load->view('footer');
	}
	
	public function add_day()
	{
		$this->load->view('loggedinheader');
		$this->load->view('add_day');
		$this->load->view('footer');
	}
}

/* End of file loggedinathlete.php */
/* Location: ./application/controllers/loggedinathlete.php */