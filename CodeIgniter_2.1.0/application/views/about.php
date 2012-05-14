<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h1>About</h1>";
	echo "Welcome to TeamTracker. It is the best way for coaches and athletes to track performance. We provide you with a series of visual tools to keep track of performance data and help athletes improve.";
}
else
{
	redirect(login/userLogin);
}
?>