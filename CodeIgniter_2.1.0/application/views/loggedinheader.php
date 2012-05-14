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
  			border: 1px solid #D0D0D0;
			-webkit-box-shadow: 0 0 8px #D0D0D0;
		}
		#container {
  			 min-height:100%;
   			position:relative;
   			background:#CAE1FF;
		}
		#body {
   			padding:15px;
  			 padding-bottom:30%;
  			 background: white;  
  			 left:15%;
  			 width:70%;
  			 height 100%;
  			 position:relative;
  			 border: 2px black;
  			 background:#EBEBEB;
			border: 1px solid #D0D0D0;
			-webkit-box-shadow: 0 0 8px #D0D0D0;
		} 	
		#footer {
   			position:absolute;
  			bottom:0;
   			height:60px;   /* Height of the footer */
   			background:#A2B5CD;
   			left:15%;
  			width:72.8%;
  			text-align:center;
  		}			
}	
	</style>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	    <script type="text/javascript" src="<?=base_url()?>jquery-1.7.2.min.js"></script>
    	<script type="text/javascript">
   	   	google.load("visualization", "1", {packages:["corechart"]});
      	google.setOnLoadCallback(drawChart);
      	function drawChart() {
   /*     	var data = new google.visualization.DataTable();
        	data.addColumn('string', 'Date');
          	data.addColumn('number', 'Miles');
          	
         //var date = new Array();
			//var time = new Array();
			var miles = new Array();

          	<?php print("var rows = " . $num_rows . " ;");?>
 //         	<?php print("var date = " . $date[1] . " ;");?>
   //       	<?php print("var time = " . $time[1] . " ;");?>
          	var i;
          	for(i=0; i<rows; i++){
          		<?php  print("miles[i] = " . $miles[0] . " ;");?>
          	}

//var date = new Array();
//var i = 0;
//<?php print("foreach ($date as $datevar):");?>
//<?php print("date[i] = " . $datevar . " ;");?>
//<?php print("endforeach;");?>

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
        };*/
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

		 var data = google.visualization.arrayToDataTable([
          ['Date', 'Cardio Training', 'Race'],
          ['October 2012',  1000,      1200],
          ['November 2012',  1100,      1150],
          ['December 2012',  1150,       900],
          ['January 2012',  1300,      875]
        ]);

        var options = {
          title: 'Cardio Training to Race Performance (Minutes x distance)'
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);

    	var data2 = google.visualization.arrayToDataTable([
          ['Date', 'Weight Training (lbs x reps)', 'Race'],
     	  ['October 2012',  1500,      1200],
          ['November 2012',  1600,      1150],
          ['December 2012',  1800,       900],
          ['January 2012',  1850,      875]
        ]);

        var options2 = {
          title: 'Weight Training to Race Performance (Minutes x distance)'
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart.draw(data2, options2);

   		var data3 = google.visualization.arrayToDataTable([
          ['Date', 'Avg. Pace (minutes/mile)'],
          ['October 2012',  10],
          ['November 2012',  10.2],
          ['December 2012',  9],
          ['January 2012',  8.7]
        ]);

        var options3 = {
          title: 'Average Pace',
          vAxis: {title: 'Date',  titleTextStyle: {color: 'red'}},
          hAxis: {title: 'Minutes',  titleTextStyle: {color: 'red'}}

        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div3'));
        chart.draw(data3, options3);


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
