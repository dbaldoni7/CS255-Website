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
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/events">Events</a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/profile">My Profile</a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/weighttraining">Training Data</a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/analysis">Analysis</a>
<div id = 'welcome'>Welcome, <a href="<?php echo base_url(); ?>index.php/loggedinathlete/profile"><?php echo $this->session->userdata('name'); ?></a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/logout">logout</a></div>
