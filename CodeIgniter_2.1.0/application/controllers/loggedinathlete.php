<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loggedinathlete extends CI_Controller {
	
	public function addnewevent()
	{
		$this->load->view('loggedinheader');
		$this->load->view('addnewevent');
		$this->load->view('footer');
	}
	
	public function profile()
	{
		$this->load->view('loggedinheader');
		$this->load->view('profile');
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
	
	public function invite_more_athletes()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('invitelist', 'Invite List', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$this->profile();
		}
		else
		{
			$teamID = 1;
			$invitelist = $this->input->post('invitelist');
			$this->send_invite_emails($invitelist, $teamID);
		}
	}
	
	public function send_invite_emails($inviteEmails, $teamID)
	{
		$headers  = 'MIME-Version: 1.0' . "\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
		$headers .=  'From: TeamTracker@example.com' . "\n" .'Reply-To: TeamTracker@example.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

		$subject = "Welcome to Team Tracker!";
		$message = "Your coach has invited you to join their team in order to view event schedules and track your progress throughout the semester.  In order to register, please visit the link below and enter the TeamID number provided.
		<br/><br/><a href=echo site_url('register/registerathlete')>Register here</a>
		<br/>TeamID: $teamID<br/><br/><br/>
		
		Welcome to the team!<br/>
		Chelsea @ Team Tracker";
		
		if(mail($inviteEmails, $subject, $message, $headers))
		{
			echo "<br/>You have successfully invited these athletes to register for your team: $inviteEmails<br/>";
			?><a href="<?php echo site_url('loggedinathlete/profile') ?>">Go back to profile</a><?php
		}
		else
		{
			echo "Sorry you messed up!";
		}
	}
}

/* End of file loggedinathlete.php */
/* Location: ./application/controllers/loggedinathlete.php */