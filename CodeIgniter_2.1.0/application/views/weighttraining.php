<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h1>Training Data</h1>";
	if($this->session->userdata('admin') == 0){
		echo "<h2>Weight</h2>";
		echo form_open('loggedinathlete/add_date');
		echo form_submit('add_date', 'Add Date');
		echo form_close();
	
		echo $table;
	
		echo "<h2>Cardio</h2>";
		echo form_open('loggedinathlete/add_date_cardio');
		echo form_submit('add_date', 'Add Date');
		echo form_close();
		
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