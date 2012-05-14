<?php

if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h1>Races</h1>";
	if ($this->session->userdata('admin') == 1) 
	{
		
		
		echo form_open('loggedinathlete/add_race');
		echo form_input('racename', set_value('racename'));
		echo form_submit('race', 'Add Race');
		//echo validation_errors();
		echo form_close();
		
	}
	echo $table;
}
else
{
	redirect(login/userLogin);
}

?>