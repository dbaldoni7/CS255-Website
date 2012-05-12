<?php

$this->load->helper('form');

echo "<h1>Coach Name</h1>";
echo form_open('');
echo ('School/Team Name</br>');
echo form_close('');

echo form_open('loggedinathlete/invite_more_athletes');
echo validation_errors();
echo form_label('Invite more athletes', 'invitelist');
echo form_textarea('invitelist', '(Comma separated email addresses please)');
echo form_submit('add_more_athletes', 'Add');
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