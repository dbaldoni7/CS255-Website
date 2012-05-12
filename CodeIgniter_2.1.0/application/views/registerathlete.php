<?php

$this->load->helper('form');

echo "<h1>Register</h1>";
echo form_open('register/registerNewAthlete');
echo validation_errors();
echo form_label('Team ID', 'teamID');
echo form_input('teamID');
echo "</br>";
echo form_label('First Name', 'firstname');
echo form_input('firstname', set_value('firstname'));
echo "</br>";
echo form_label('Last Name', 'lastname');
echo form_input('lastname', set_value('lastname'));
echo "</br>";
echo form_label('Email', 'email');
echo form_input('email', set_value('email'));
echo "</br>";
echo form_label('Grad Year', 'gradyear');
echo form_input('gradyear', set_value('gradyear'));
echo "</br>";
echo form_label('Brief Bio', 'bio');
echo form_textarea('bio', set_value('bio'));
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