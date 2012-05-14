<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h2>Event Name</h2>";
	
	echo form_open('loggedinathlete/add_race');
	echo form_submit('add_race', 'Add Race');
	echo form_close();
	
	echo $athlete_list;

}
else
{
	redirect(login/userLogin);
}
?>