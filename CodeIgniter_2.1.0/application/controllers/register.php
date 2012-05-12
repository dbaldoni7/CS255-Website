<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function displayRegisterCoachView()
	{
		$this->load->view('header');
		$this->load->view('registercoach');
		$this->load->view('footer');
	}
	
	public function displayRegisterAthleteView()
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
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('sport', 'sport', 'trim|required|xss_clean');
		$this->form_validation->set_rules('school', 'school', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			
			$this->displayRegisterCoachView();
		}
		else{
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$name = "$firstname" . " " . "$lastname";
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$school = $this->input->post('school');
			$sport = $this->input->post('sport');
			$invitelist = $this->input->post('invitelist');
			
			$this->load->model('Model');
			$teamID = $this->Model->registerCoach($name, $email, $password, $school, $sport);
			if($teamID){
				echo "Coach Registered Successfully<br/>";
				?><a href="<?php echo site_url('loggedinathlete/coachprofile') ?>">Go to profile</a><?php
				$this->sendInviteEmails($invitelist, $teamID, $name, $school, $sport);
			}
		}
	}
	
	public function registerNewAthlete(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('firstname', 'first name', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('lastname', 'last name', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('confirmpw', 'confirm password', 'trim|required|matches[password]|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('sport', 'sport', 'trim|required|xss_clean');
		$this->form_validation->set_rules('school', 'school', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			
			$this->displayRegisterAthleteView();
		}
		else{
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$name = "$firstname" . " " . "$lastname";
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$school = $this->input->post('school');
			$sport = $this->input->post('sport');
			$invitelist = $this->input->post('invitelist');
			
			$this->load->model('Model');
			$teamID = $this->Model->registerCoach($name, $email, $password, $school, $sport);
			if($teamID){
				echo "Coach Registered Successfully<br/>";
				?><a href="<?php echo site_url('loggedinathlete/coachprofile') ?>">Go to profile</a><?php
				$this->sendInviteEmails($invitelist, $teamID, $name, $school, $sport);
			}
		}
	}

	public function sendInviteEmails($inviteEmails, $teamID, $name, $school, $sport)
	{
		$headers  = 'MIME-Version: 1.0' . "\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
		$headers .=  'From: TeamTracker@example.com' . "\n" .'Reply-To: TeamTracker@example.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

		$subject = "Welcome to Team Tracker!";
		$message = "Your coach, $name, has invited you to join $school's $sport team in order to view event schedules and track your progress throughout the semester.  In order to register, please visit the link below and enter the TeamID number provided.
		<br/><br/><a href=echo site_url('register/registerathlete')>Register here</a>
		<br/>TeamID: $teamID<br/><br/><br/>
		
		Welcome to the team!<br/>
		Chelsea @ Team Tracker";
		
		if(mail($inviteEmails, $subject, $message, $headers))
		{
			echo "<br/>You have successfully invited these athletes to register for your team: $inviteEmails";
		}
		else
		{
			echo "Sorry you messed up!";
		}
	}
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */