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
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	    <script type="text/javascript" src="<?=base_url()?>jquery-1.7.2.min.js"></script>
    	<script type="text/javascript">
   	   	google.load("visualization", "1", {packages:["corechart"]});
      	google.setOnLoadCallback(drawChart);
      	function drawChart() {
        	var data = new google.visualization.DataTable();
        	data.addColumn('string', 'Date');
          	data.addColumn('number', 'Miles');
          	
      /*    //var date = new Array();
			//var time = new Array();*/
			var miles = new Array();

          	<?php print("var rows = " . $num_rows . " ;");?>
 //         	<?php print("var date = " . $date[1] . " ;");?>
   //       	<?php print("var time = " . $time[1] . " ;");?>
          	var i;
          	for(i=0; i<rows; i++){
          		<?php  print("miles[i] = " . $miles[0] . " ;");?>
          	}

/*//var date = new Array();
//var i = 0;
//<?php print("foreach ($date as $datevar):");?>
//<?php print("date[i] = " . $datevar . " ;");?>
//<?php print("endforeach;");?>*/3

          	data.addRows(rows);
         	for(var i = 0; i<rows; i++)
         	{
         		data.setValue(i, 0, 'date');
         	}
         	
         	for(var i = 0; i<rows; i++)
         	{
         		data.setValue(i, 1, miles[i]);
         	}
        var options = {
          title: 'Total Training Distance'
        };
       /* 
        function drawChart() {
      	var jsonData = $.ajax({
          url: "getDataPlease",
          dataType:"json",
          async: false
          }).responseText;
        
        var options = {
          title: 'Company Performance'
        };
        
      	// Create our data table out of JSON data loaded from server.
      	var data = new google.visualization.DataTable(jsonData);
*/
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);

      }
    </script>
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
