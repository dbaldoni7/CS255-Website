<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	

	if($this->session->userdata('admin') == 0){
		echo "<h1>Weight Training</h1>";
		echo form_open('loggedinathlete/add_date');
		echo form_submit('add_date', 'Add Date');
		echo form_close();
	
		echo $table;
		
		echo $cardio_table;
	}
	else{
		
		
	}

}


else
{
	redirect(login/userLogin);
}
?>