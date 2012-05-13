<?php

$this->load->helper('form');

echo "<h1>Register</h1>";
echo form_open('register/registerNewCoach');
echo validation_errors();
echo form_label('First Name', 'firstname');
echo form_input('firstname', set_value('firstname'));
echo "</br>";
echo form_label('Last Name', 'lastname');
echo form_input('lastname', set_value('lastname'));
echo "</br>";
echo form_label('Email', 'email');
echo form_input('email', set_value('email'));
echo "</br>";
echo form_label('Password', 'password');
echo form_password('password');
echo "</br>";
echo form_label('Confirm password', 'confirmpw');
echo form_password('confirmpw');
echo "</br>";
echo form_label('Sport', 'sport');
echo form_input('sport', set_value('sport'));
echo "</br>";
echo form_label('School', 'school');
echo form_input('school', set_value('school'));
echo "</br>";
/*echo form_label('Athletes to invite', 'invitelist');
echo form_textarea('invitelist', '(Comma separated email addresses please)');
echo "</br>";*/
echo form_submit('confirmreg', 'Confirm registration');
echo form_close();
?>