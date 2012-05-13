<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');

	echo "<h2>Add Date</h2>";
	echo validation_errors();
	echo form_open('loggedinathlete/add_new_weight');
	echo form_label('Date', 'date');
	echo form_input('date', 'XXXX-XX-XX');
	echo "</br>";
	echo form_label('Chest', 'chest');
	echo form_input('chest', set_value('chest'));
	echo "</br>";
	echo form_label('Biceps', 'biceps');
	echo form_input('biceps', set_value('biceps'));
	echo "</br>";
	echo form_label('Triceps', 'triceps');
	echo form_input('triceps', set_value('triceps'));
	echo "</br>";
	echo form_label('Quads', 'quads');
	echo form_input('quads', set_value('quads'));
	echo "</br>";
	echo form_label('Hamstrings', 'hamstrings');
	echo form_input('hamstrings', set_value('hamstrings'));
	echo "</br>";
	echo form_label('Back', 'back');
	echo form_input('back', set_value('back'));
	echo "</br>";
	echo form_label('Shoulders', 'shoulders');
	echo form_input('shoulders', set_value('shoulders'));
	echo "</br>";
	echo form_submit('add day', 'Add');
	echo form_close();
	echo form_open('loggedinathlete/weighttraining');
	echo form_submit('cancel', 'Cancel');
	echo form_close();
}
else
{
	redirect(login/userLogin);
}

?>