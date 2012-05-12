<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to TeamTracker</title>
	
	<link rel = "stylesheet" type="text/css" href = "<?php echo base_url(); ?>application/assets/format.css" />
   	<style type="text/css">


	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
		text-align: center;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		left: 25%;
		width: 50%;
		position:absolute;
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}

	</style>
</head>
<body>
	
<h1>TeamTracker</h1>
	
<div id = "container">
	<p>Welcome to TeamTracker. It is the best way for coaches and athletes to track performance. We provide you with
		a series of visual tools to keep track of performance data and help athletes improve. Get started <a href = "<?php echo base_url(); ?>index.php/register/registercoach" >here</a></p>
	<br/>
	<?php
		echo "Username<br/>";
		echo form_open('loggedinathlete/validateLogin');
		$data = array(
              'name'        => 'email',
              'id'          => 'email',
            );

		echo form_input($data);
		
		echo"Password<br/>";
		$data = array(
              'name'        => 'password',
              'id'          => 'passwrod',
            );

		echo form_password($data);
		echo "<center>";
		echo form_submit('submit_login', 'Login');
		echo "</cenetr>";
		echo form_close();
	?>
</div>

</body>
</html>