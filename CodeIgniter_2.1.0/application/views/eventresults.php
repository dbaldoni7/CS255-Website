<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h1>Event Name</h1>";
	echo form_open('loggedinathlete/addathletes');
	echo form_submit('add_athletes', 'Add Athletes');
	echo form_close();
	
	echo form_submit('add_race', 'Add Race');
}
else
{
	redirect(login/userLogin);
}
?>