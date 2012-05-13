<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	if($this->session->userdata('admin') == 0){
		echo "<h1>Weight Training</h1>";
		echo form_open('loggedinathlete/add_day');
		echo form_submit('add_day', 'Add Day');
		echo form_close();
	
		echo $table;
	}
	else{
		
		
	}
}


else
{
	redirect(login/userLogin);
}
?>