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
			
			text-align: center;
		}
		#welcome
		{
			float: right;
		}
		#header {
   			background:#A2B5CD;
   			padding:10px;
   			height:30px;
   			left:15%;
  			width:71%;
  			position:relative;
		}
		#container {
  			 min-height:100%;
   			position:relative;
   			background:#CAE1FF;
		}
		#body {
   			padding:15px;
  			 padding-bottom:30%;/* Height of the footer */
  			 background: white;  
  			 left:15%;
  			 width:70%;
  			 height 100%;
  			 position:relative;
  			 border: 2px black;
  			 background:#EBEBEB; 
		}	
		#footer {
   			position:absolute;
  			 bottom:0;
   			width:100%;
   			height:60px;   /* Height of the footer */
   			background:#A2B5CD;
   			left:15%;
  			width:72.5%;
  			
}		
		
	</style>
</head>
<body>
<div id = "container">
<div id = "header">
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/events">Events</a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/profile">My Profile</a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/weighttraining">Training Data</a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/analysis">Analysis</a>
<div id = 'welcome'>Welcome, <a href="<?php echo base_url(); ?>index.php/loggedinathlete/profile"><?php echo $this->session->userdata('name'); ?></a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/logout">logout</a></div>
</div>
<div id = "body">