<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');

	echo "<h2>Add Date</h2>";
	echo validation_errors();
	echo form_open('loggedinathlete/add_new_cardio');
	echo form_label('Date', 'date');
	echo form_input('date', 'XXXX-XX-XX');
	echo "</br>";
	echo form_label('Distance', 'distance');
	echo form_input('distance', set_value('distance'));
	echo "</br>";
	echo form_label('Time', 'time');
	echo form_input('time', set_value('time'));
	echo "</br>";
	echo form_submit('add day', 'Add');
	echo form_close();
	echo form_open('loggedinathlete/weighttraining');
	echo form_submit('cancel', 'Cancel');
	echo form_close();
}
else
{
	redirect(login/userLogin);
}

?>