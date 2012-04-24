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
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */