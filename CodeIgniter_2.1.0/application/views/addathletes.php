<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h2>Add Athletes</h2>";
	echo form_open('loggedinathlete/eventresults');
	echo form_submit('add day', 'Add');
	echo form_submit('cancel', 'Cancel');
	echo form_close();
}
else
{
	redirect(login/userLogin);
}

?>