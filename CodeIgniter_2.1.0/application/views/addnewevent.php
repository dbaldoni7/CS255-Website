<?php

$this->load->helper('form');

echo "<h1>Add New Event</h1>";
echo form_open('');
echo form_label('Event Name', 'eventname');
echo form_input('eventname');
echo "</br>";
echo form_label('Date', 'date');
echo form_input('date');
echo "</br>";
echo form_label('Location', 'location');
echo form_input('location');
echo "</br>";
echo form_submit('add_new_event)', 'Submit');
echo form_close();

?>