<?php

$this->load->helper('form');

echo "<h1>Events</h1>";
echo form_open('loggedinathlete/addnewevent');
echo form_submit('add_new_event', 'Add Event');
echo form_close();

echo form_submit('add_new_event', 'Delete Event');

?>