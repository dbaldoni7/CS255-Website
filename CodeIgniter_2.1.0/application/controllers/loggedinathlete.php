<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loggedinathlete extends CI_Controller {
	
	public function displayaddnewevent()
	{
		$this->load->view('loggedinheader');
		$this->load->view('addnewevent');
		$this->load->view('footer');
	}

	public function test()
	{
		$this->load->view('testview');
	}
	
	public function post(){
		$val = $_POST['value'];
		echo $val;
	}
	public function raceresults(){
		if($this->uri->segment(3) > 0){
			$race =$this->uri->segment(3);
			$this->session->set_userdata('raceID', $race);
		}
		
		$raceID = $this->session->userdata('raceID');
		$result = $this->Model->getRaceResults($raceID);
		if($result){
			$data['raceresults'] = $result;
		}

		$teamID = $this->session->userdata('teamID');
		$data['athletes'] = $this->Model->getAllAthletes($teamID);
		
		
		$this->load->view('loggedinheader');
		$this->load->view('raceresults',$data);
		$this->load->view('footer');
	}
	
	public function profile()
	{
		$this->load->view('loggedinheader');
		$this->load->view('profile');
		$this->load->view('footer');
	}
	
	public function races(){
		
		if($this->uri->segment(3) > 0){
			$event =$this->uri->segment(3);
			$this->session->set_userdata('eventID', $event);
		}
		
		$eventID = $this->session->userdata('eventID');
		$result = $this->Model->getRaces($eventID);
	
		$this->table->set_heading(array('Race'));
		
		if($result){
			foreach($result->result() as $row){
				$name = $row->racename;
				$raceID = $row->raceID;
				$this->session->set_userdata('raceID', $raceID);
		
				$event = anchor('loggedinathlete/raceresults/'.$raceID, $name);
				$this->table->add_row(array($event));
			}
		}
	
	
		$tmpl = array( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
		$this->table->set_template($tmpl);
	
		$data['table'] = $this->table->generate();
		
		$this->load->view('loggedinheader');
		$this->load->view('races',$data);
		$this->load->view('footer');
		
	}
	
	public function events()
	{
		$teamID = $this->session->userdata('teamID');	
		$result = $this->Model->getEvents($teamID);
	
		$this->table->set_heading(array('Title', 'Location', 'Date'));
		
		if($result){
			foreach($result->result() as $row){
				$eventName = $row->eventname;
				$eventDate = $row->date;
				$eventLoc = $row->location;
				$eventID = $row->eventID;
			
				$event = anchor('loggedinathlete/races/'.$eventID, $eventName);
				$this->table->add_row(array($event, $eventLoc, $eventDate));
			}
		}
	
	
		$tmpl = array( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
		$this->table->set_template($tmpl);
	
		$data['table'] = $this->table->generate();
		
		$this->load->view('loggedinheader');
		$this->load->view('events',$data);
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
	
	public function about()
	{
		$this->load->view('loggedinheader');
		$this->load->view('about');
		$this->load->view('footer');
	}
	
	public function contact()
	{
		$this->load->view('loggedinheader');
		$this->load->view('contact');
		$this->load->view('footer');
	}
	
	public function add_race()
	{	
		$eventID = $this->session->userdata('eventID');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('race', 'race', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			
			$this->races();
		}
		else{
			$race = $this->input->post('racename');
			
			$this->load->model('Model');
			if($this->Model->addNewRaces($race, $eventID)){
				$this->races();
			}
		}
	
	}
	
	public function weighttraining()
	{
		if($this->session->userdata('admin') == 1){
			$this->coachWeightTraining();
			
		}
		else{
			$userID = $this->session->userdata('userID');	
			$result = $this->Model->getWeightData($userID);
		
	
			$this->table->set_heading(array('Chest', 'Back', 'Biceps', 'Triceps','Quads', 'Hamstrings', 'Shoulders', 'Date'));
			
			if($result){
				foreach($result->result() as $row){
					$date = $row->date;
					$chest = $row->chest;
					$back = $row->back;
					$bis = $row->biceps;
					$tris = $row->triceps;
					$quads = $row->quads;
					$hamstrings = $row->hamstrings;
					$shoulders = $row->shoulders;
					$chest_r = $row->chest_r;
					$back_r = $row->back_r;
					$bis_r = $row->biceps_r;
					$tris_r = $row->triceps_r;
					$quads_r = $row->quads_r;
					$hamstrings_r = $row->hamstrings_r;
					$shoulders_r = $row->shoulders_r;
				
					$this->table->add_row(array($chest, $chest_r, $back, $back_r, $bis, $bis_r, $tris, $tris_r, $quads, $quads_r, $hamstrings, $hamstrings_r, $shoulders, $shoulders_r, $date));
				}
			}
		
			$tmpl = array( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">',   'heading_cell_start'  => '<th colspan=2>',
	                    'heading_cell_end'    => '</th>' );
			$this->table->set_template($tmpl);
		
			$data['table'] = $this->table->generate();
			
			//cardio table for athlete
			$result = $this->Model->getCardioData($userID);
		
			$this->table->set_heading(array('Date', 'Distance', 'Time'));
			
			if($result){
				foreach($result->result() as $row){
					$date = $row->date;
					$dist = $row->distance;
					$time = $row->time;
				
					$this->table->add_row(array($date, $dist, $time));
				}
			}
	
			$tmpl = array( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
			$this->table->set_template($tmpl);
		
			$data['cardio_table'] = $this->table->generate();
			
			$this->load->view('loggedinheader');
			$this->load->view('weighttraining', $data);
			$this->load->view('footer');
		}
	}
	
	public function add_date()
	{
		$this->load->view('loggedinheader');
		$this->load->view('add_day');
		$this->load->view('footer');
	}
	
	public function add_date_cardio()
	{
		$this->load->view('loggedinheader');
		$this->load->view('add_date_cardio');
		$this->load->view('footer');
	}
	
	public function add_new_event(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('eventname', 'event name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('date', 'date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('location', 'location', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			
			$this->displayaddnewevent();
		}
		else{
			$eventname = $this->input->post('eventname');
			$date = $this->input->post('date');
			$location = $this->input->post('location');
			$teamID = $this->session->userdata('teamID');
			
			$this->load->model('Model');
			if($this->Model->addNewEvent($teamID, $eventname, $date, $location)){
				$this->events();
			}
		}
	}
	
	public function add_new_weight(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('date', 'date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('chest', 'chest', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('chest_r', 'chest_r', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('biceps', 'biceps', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('biceps_r', 'biceps_r', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('triceps', 'triceps', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('triceps_r', 'triceps_r', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('quads', 'quads', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('quads_r', 'quads_r', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('hamstrings', 'hamstrings', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('hamstrings_r', 'hamstrings_r', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('back', 'back', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('back_r', 'back_r', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('shoulders', 'shoulders', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('shoulders_r', 'shoulders_r', 'trim|numeric|xss_clean');

		
		if($this->form_validation->run() == FALSE){
			$this->add_date();
		}
		else{
			$userID = $this->session->userdata('userID');
			$date = $this->input->post('date');
			$chest = $this->input->post('chest');
			$biceps = $this->input->post('biceps');
			$triceps = $this->input->post('triceps');
			$quads = $this->input->post('quads');
			$hamstrings = $this->input->post('hamstrings');
			$back = $this->input->post('back');
			$shoulders = $this->input->post('shoulders');
			$chest_r = $this->input->post('chest_r');
			$biceps_r = $this->input->post('biceps_r');
			$triceps_r = $this->input->post('triceps_r');
			$quads_r = $this->input->post('quads_r');
			$hamstrings_r = $this->input->post('hamstrings_r');
			$back_r = $this->input->post('back_r');
			$shoulders_r = $this->input->post('shoulders_r');

			$this->load->model('Model');
			if($this->Model->addNewWeight($userID, $date, $chest, $biceps, $triceps, $quads, $hamstrings, $back, $shoulders, $chest_r, $biceps_r, $triceps_r, $quads_r, $hamstrings_r, $back_r, $shoulders_r)){
				$this->weighttraining();
			}
		}
	}
		
	public function add_new_cardio(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('date', 'date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('distance', 'distance', 'trim|required|xss_clean');
		$this->form_validation->set_rules('time', 'time', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			
			$this->add_date_cardio();
		}
		else{
			$userID = $this->session->userdata('userID');
			$date = $this->input->post('date');
			$distance = $this->input->post('distance');
			$time = $this->input->post('time');

			$this->load->model('Model');
			if($this->Model->addNewCardio($userID, $date, $distance, $time)){
				$this->weighttraining();
			}
		}
	}
	
	public function change_password(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('current', 'current password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('new', 'new Password', 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('confirm', 'confirm new password', 'trim|required|matches[new]|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			
			$this->profile();
		}
		else{
			$userID = $this->session->userdata('userID');
			$oldpassword = $this->input->post('current');
			$newpassword = $this->input->post('new');
			
			$this->load->model('Model');
			if($this->Model->changePassword($userID, $oldpassword, $newpassword)){
				echo "Your password has successfully been changed";
				$this->profile();
			}
		}
	}
	
	public function edit_bio(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('bio', 'bio', 'trim|xss_clean');
		if($this->form_validation->run() == FALSE){
			$this->profile();
		}
		else{
			$userID = $this->session->userdata('userID');
			$bio = $this->input->post('bio');
			$this->session->set_userdata('bio', $bio);
			
			$this->load->model('Model');
			if($this->Model->editBio($userID, $bio)){
				$this->profile();
				echo "Bio updated";
			}
		}
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
		$name = $this->session->userdata('name');
		$sport = $this->session->userdata('sport');
		$school = $this->session->userdata('school');
		
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
			echo "<br/>You have successfully invited these athletes to register for your team: $inviteEmails<br/>";
			?><a href="<?php echo site_url('loggedinathlete/profile') ?>">Go back to profile</a><?php
		}
		else
		{
			echo "Sorry you messed up!</br>";
			?><a href="<?php echo site_url('loggedinathlete/profile') ?>">Go back to profile</a><?php
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('welcome');
	}
	
	public function coachWeightTraining(){
		
		//create list of athletes for coach
		
		$teamID = $this->session->userdata('teamID');
		$result = $this->Model->getAllAthletes($teamID);
		
		if($result){
			foreach($result->result() as $row){
				$userID = $row->userID;
				$name = $row->name;
				$link = anchor(base_url() . 'index.php/loggedinathlete/coachWeightTables/'.$userID, $name);
				$this->table->add_row(array($link));
			}
		}
		
		$tmpl = array( 'table_open'  => '<table border="0" cellpadding="0" cellspacing="0"' );
		$this->table->set_template($tmpl);
	
		$data['athlete_list'] = $this->table->generate();
		
		$this->load->view('loggedinheader');
		$this->load->view('weighttraining', $data);
		$this->load->view('footer');
	}

	public function coachWeightTables(){
		$userID = $this->uri->segment(3);
		$result = $this->Model->getWeightData($userID);
	
		$this->table->set_heading(array('Chest', 'Back', 'Biceps', 'Triceps','Quads', 'Hamstrings', 'Shoulders', 'Date'));
		if($result){
				foreach($result->result() as $row){
					$date = $row->date;
					$chest = $row->chest;
					$back = $row->back;
					$bis = $row->biceps;
					$tris = $row->triceps;
					$quads = $row->quads;
					$hamstrings = $row->hamstrings;
					$shoulders = $row->shoulders;
					$chest_r = $row->chest_r;
					$back_r = $row->back_r;
					$bis_r = $row->biceps_r;
					$tris_r = $row->triceps_r;
					$quads_r = $row->quads_r;
					$hamstrings_r = $row->hamstrings_r;
					$shoulders_r = $row->shoulders_r;
				
					$this->table->add_row(array($chest, $chest_r, $back, $back_r, $bis, $bis_r, $tris, $tris_r, $quads, $quads_r, $hamstrings, $hamstrings_r, $shoulders, $shoulders_r, $date));
				}
		}
		$tmpl = array( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">',   'heading_cell_start'  => '<th colspan=2>',
                    'heading_cell_end'    => '</th>' );
		$this->table->set_template($tmpl);
	
		$data['coach_table'] = $this->table->generate();
		
		//cardio table for athlete
		$result = $this->Model->getCardioData($userID);
	
		$this->table->set_heading(array('Date', 'Distance', 'Time'));
		
		if($result){
			foreach($result->result() as $row){
				$date = $row->date;
				$dist = $row->distance;
				$time = $row->time;
			
				$this->table->add_row(array($date, $dist, $time));
			}
		}

		$tmpl = array( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
		$this->table->set_template($tmpl);
	
		$data['coach_cardio'] = $this->table->generate();
		
		//athlete list
		$teamID = $this->session->userdata('teamID');
		$result = $this->Model->getAllAthletes($teamID);
		
		if($result->num_rows() > 0){
			foreach($result->result() as $row){
				$userID = $row->userID;
				$name = $row->name;
				$link = anchor(base_url() . 'index.php/loggedinathlete/coachWeightTables/'.$userID, $name);
				$this->table->add_row(array($link));
			}
		}
		
		$tmpl = array( 'table_open'  => '<table border="0" cellpadding="0" cellspacing="0"' );
		$this->table->set_template($tmpl);
	
		$data['athlete_list'] = $this->table->generate();
		
		$this->load->view('loggedinheader');
		$this->load->view('weighttraining', $data);
		$this->load->view('footer');
	}

}

/* End of file loggedinathlete.php */
/* Location: ./application/controllers/loggedinathlete.php */