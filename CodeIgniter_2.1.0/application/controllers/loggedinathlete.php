<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loggedinathlete extends CI_Controller {

	public function addnewevent()
	{
		$this->load->view('loggedinheader');
		$this->load->view('addnewevent');
		$this->load->view('footer');
	}
}

/* End of file loggedinathlete.php */
/* Location: ./application/controllers/loggedinathlete.php */