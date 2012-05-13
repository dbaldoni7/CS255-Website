<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h1>About</h1>";
}
else
{
	redirect(login/userLogin);
}
?>