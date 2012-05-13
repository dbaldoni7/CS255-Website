<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h2>".$this->session->userdata('name')."</h2>";
	echo form_open('');
	echo ('<b>School/Team Name</b></br></br>');
	echo '<b>'.$this->session->userdata('school') .' - '. $this->session->userdata('sport').'</b></br></br>';
	
	if ($this->session->userdata('admin') == 0) 
	{
		echo ('<b>Graduation Year</b></br>');
		echo $this->session->userdata('gradyear');
		echo "<br/><br/>";
		echo form_textarea('bio', $this->session->userdata('bio'));
		echo "</br>";
		echo form_submit('edit', 'Edit Bio');
		echo form_close();
	}
	
	if ($this->session->userdata('admin') == 1) 
	{
		echo form_close();
		echo form_open('loggedinathlete/invite_more_athletes');
		echo validation_errors();
		echo form_label('Invite more athletes', 'invitelist');
		echo form_textarea('invitelist', '(Comma separated email addresses please)');
		echo form_submit('add_more_athletes', 'Add');
		echo form_close();
	}
	
	echo form_open('');
	echo "<h2>Change Password</h2>";
	echo form_label('current password', 'current');
	echo form_password('current');
	echo "</br>";
	echo form_label('new password', 'new');
	echo form_password('new');
	echo "</br>";
	echo form_label('confirm new password', 'confirm');
	echo form_password('confirm');
	echo "</br>";
	echo form_submit('change_password', 'Change Password');
	echo form_close();
}
else
{
	redirect(login/userLogin);
}
?>