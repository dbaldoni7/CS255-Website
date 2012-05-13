<?php

$this->load->helper('form');

echo "<h2>".$this->session->userdata('name')."</h2>";
echo form_open('');
echo '<b>'.$this->session->userdata('school') .' - '. $this->session->userdata('sport').'</b></br></br>';
echo ('<b>Graduation Year</b></br>');
echo $this->session->userdata('gradyear');
echo "<br/><br/>";
echo form_textarea('bio', $this->session->userdata('bio'));
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