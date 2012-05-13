<?php

if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h1>Events</h1>";
	if ($this->session->userdata('admin') == 1) 
	{
	
		echo form_open('loggedinathlete/displayaddnewevent');
		echo form_submit('add_new_event', 'Add Event');
		echo form_close();
		
		echo form_submit('add_new_event', 'Delete Event');
		
	}
	echo $table;
}
else
{
	redirect(login/userLogin);
}

?>