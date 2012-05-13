<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h1>Analysis</h1>";
	echo form_open('');
	
	echo form_close();
}
else
{
	redirect(login/userLogin);
}
?>