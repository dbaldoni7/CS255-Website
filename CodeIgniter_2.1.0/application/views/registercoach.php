<?php

$this->load->helper('form');

echo "<h1>Register</h1>";
echo form_open('loggedinathlete/profile');
echo form_label('Name', 'name');
echo form_input('name');
echo "</br>";
echo form_label('Email', 'email');
echo form_input('email');
echo "</br>";
echo form_label('Password', 'password');
echo form_password('password');
echo "</br>";
echo form_label('Confirm password', 'confirmpw');
echo form_password('confirmpw');
echo "</br>";
echo form_label('Sport', 'sport');
echo form_input('sport');
echo "</br>";
echo form_label('Athletes to invite', 'invitelist');
echo form_textarea('invitelist', '(Comma separated email addresses please)');
echo "</br>";
echo form_submit('confirmreg', 'Confirm registration');
echo form_close();
?>