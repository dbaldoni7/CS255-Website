<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h1>Add New Event</h1>";
	echo form_open('loggedinathlete/add_new_event');
	echo validation_errors();
	echo form_label('Event Name', 'eventname');
	echo form_input('eventname', set_value('eventname'));
	echo "</br>";
	echo form_label('Date', 'date');
	echo form_input('date', 'XX/XX/20XX');
	echo "</br>";
	echo form_label('Location', 'location');
	echo form_input('location', set_value('firstname'));
	echo "</br>";
	echo form_submit('add_new_event', 'Submit');
	echo form_close();
	
	echo form_open('loggedinathlete/events');
	echo form_submit('add_new_event', 'Back');
	echo form_close();
}
else
{
	redirect(login/userLogin);
}

?>