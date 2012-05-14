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
		echo "(lb/reps)";
		echo $table;
	
		echo "<h2>Cardio</h2>";
		echo form_open('loggedinathlete/add_date_cardio');
		echo form_submit('add_date', 'Add Date');
		echo form_close();
		
		echo $cardio_table;

	}
	else{
		echo "<h2>Athletes</h2>";
		
		if(isset($coach_table)){
			echo "<h3>Weight (lbs/rep)</h3>";
			echo $coach_table;
			echo "<br/>";
		}
		if(isset($coach_cardio)){
			echo "<h3>Cardio</h3>";
			echo $coach_cardio;
			echo "<br/>";
		}
		
		echo $athlete_list;
		
	}

}


else
{
	redirect(login/userLogin);
}
?>