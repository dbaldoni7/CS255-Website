<?php

$this->load->helper('form');

echo "<h2>Add Day</h2>";
echo form_open('loggedinathlete/weighttraining');
echo form_label('Day', 'day');
echo form_input('day');
echo "</br>";
echo form_label('Chest', 'chest');
echo form_input('chest');
echo "</br>";
echo form_label('Biceps', 'biceps');
echo form_input('biceps');
echo "</br>";
echo form_label('Triceps', 'triceps');
echo form_input('triceps');
echo "</br>";
echo form_label('Quads', 'quads');
echo form_input('quads');
echo "</br>";
echo form_label('Hamstrings', 'hamstrings');
echo form_input('hamstrings');
echo "</br>";
echo form_label('Back', 'back');
echo form_input('back');
echo "</br>";
echo form_label('Shoulders', 'shoulders');
echo form_input('shoulders');
echo "</br>";
echo form_label('Abs', 'abs');
echo form_input('abs');
echo "</br>";
echo form_submit('add day', 'Add');
echo form_submit('cancel', 'Cancel');
echo form_close();


?>