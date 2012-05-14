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
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/events">Events</a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/profile">My Profile</a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/weighttraining">Training Data</a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/analysis">Analysis</a>
<div id = 'welcome'>Welcome, <a href="<?php echo base_url(); ?>index.php/loggedinathlete/profile"><?php echo $this->session->userdata('name'); ?></a> | 
<a href="<?php echo base_url(); ?>index.php/loggedinathlete/logout">logout</a></div>
