<?php

$this->load->helper('form');

echo "<h1>Athlete Name</h1>";
echo form_open('');
echo ('School/Team Name</br>');
echo ('Graduation Year</br>');
echo form_textarea('bio', '');
echo "</br>";
echo form_submit('edit', 'Edit Bio');
echo form_close();

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




?>