<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h1>Analysis</h1>";
	echo form_open('');
	echo "<div id='chart_div' style='width: 900px; height: 500px;'></div>";
	echo form_close();
}
else
{
	redirect(login/userLogin);
}
?>