<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');

	echo "<h2>Add Date</h2>";
	echo validation_errors();
	echo form_open('loggedinathlete/add_new_weight');
	echo "<table>";
	echo "<tr><td>";
	echo form_label('Date', 'date');
	echo "</td><td>";
	echo form_input('date', 'XXXX-XX-XX');
	echo "</td></tr>";
	echo "<tr><td></td><td>Weight (lbs)</td><td># of reps</td></tr>";
	echo "<tr><td>";
	echo form_label('Chest', 'chest');
	echo "</td><td>";
	echo form_input('chest', set_value('chest'));
	echo "</td><td>";
	echo form_input('chest_r', set_value('chest_r'));
	echo "</td></tr>";
	echo "<tr><td>";
	echo form_label('Biceps', 'biceps');
	echo "</td><td>";
	echo form_input('biceps', set_value('biceps'));
	echo "</td><td>";
	echo form_input('biceps_r', set_value('biceps_r'));
	echo "</td></tr>";
	echo "<tr><td>";
	echo form_label('Triceps', 'triceps');
	echo "</td><td>";
	echo form_input('triceps', set_value('triceps'));
	echo "</td><td>";	
	echo form_input('triceps_r', set_value('triceps_r'));
	echo "</td></tr>";
	echo "<tr><td>";
	echo form_label('Quads', 'quads');
	echo "</td><td>";
	echo form_input('quads', set_value('quads'));
	echo "</td><td>";
	echo form_input('quads_r', set_value('quads_r'));
	echo "</td></tr>";
	echo "<tr><td>";
	echo form_label('Hamstrings', 'hamstrings');
	echo "</td><td>";
	echo form_input('hamstrings', set_value('hamstrings'));
	echo "</td><td>";
	echo form_input('hamstrings_r', set_value('hamstrings_r'));
	echo "</td></tr>";
	echo "<tr><td>";
	echo form_label('Back', 'back');
	echo "</td><td>";
	echo form_input('back', set_value('back'));
	echo "</td><td>";
	echo form_input('back_r', set_value('back_r'));
	echo "</td></tr>";
	echo "<tr><td>";
	echo form_label('Shoulders', 'shoulders');
	echo "</td><td>";
	echo form_input('shoulders', set_value('shoulders'));
	echo "</td><td>";
	echo form_input('shoulders_r', set_value('shoulders_r'));
	echo "</td></tr>";
	echo "</table>";
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