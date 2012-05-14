<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');

	echo "<h1>Contact</h1>";
	echo "Questions? We would be happy to help</br> You can reach us at baldonid@bc.edu or dostaler@bc.edu";
}
else
{
	redirect(login/userLogin);
}
?>