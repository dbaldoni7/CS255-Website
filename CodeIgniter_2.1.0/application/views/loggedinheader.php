<html>
<head>
	<title>Team Tracking</title>
	<link rel = "stylesheet" type="text/css" href = "<?php echo base_url(); ?>application/assets/format.css" />
	<style type="text/css">
		label
		{
			float:left;
			width:150px;
		}
		
		#footer 
		{
			margin-top:2em;
			text-align: center;
		}
		#welcome
		{
			float: right;
		}
		
	</style>
</head>
<body>
<a href="events">Events</a> | 
<a href="profile">My Profile</a> | 
<a href="weighttraining">Weight Data</a> | 
<a href="analysis">Analysis</a> |
<a href="logout">logout</a>
<div id = 'welcome'>Welcome, <a href="profile"><?php echo $this->session->userdata('name'); ?></a> </div>