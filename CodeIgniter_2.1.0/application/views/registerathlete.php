<?php

$this->load->helper('form');

echo "<h1>Register</h1>";
echo form_open('loggedinathlete/profile');
echo form_label('Team ID', 'teamID');
echo form_input('teamID');
echo "</br>";
echo form_label('First Name', 'firstname');
echo form_input('firstname');
echo "</br>";
echo form_label('Last Name', 'lastname');
echo form_input('lastname');
echo "</br>";
echo form_label('Grad Year', 'gradyear');
echo form_input('gradyear');
echo "</br>";
echo form_label('Brief Bio', 'bio');
echo form_textarea('bio');
echo "</br>";
echo form_label('Username', 'username');
echo form_input('username');
echo "</br>";
echo form_label('Password', 'password');
echo form_password('password');
echo "</br>";
echo form_label('Confirm password', 'confirmpw');
echo form_password('confirmpw');
echo "</br>";
echo form_submit('confirmreg', 'Confirm registration');
echo form_close();
?>