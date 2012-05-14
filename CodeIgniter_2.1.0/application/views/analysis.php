<?php
if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h1>Analysis</h1>";
	echo form_open('');
	echo "<div id='chart_div' style='width: 800px; height: 400px;'></div>";
	echo "<div id='chart_div2' style='width: 800px; height: 400px;'></div>";
	echo "<div id='chart_div3' style='width: 800px; height: 400px;'></div>";
	echo'<img src="http://chart.apis.google.com/chart?chxr=0,3.333,158.333&chxt=x&chbh=a&chs=800x200&cht=bhs&chco=4D89F9,C6D9FD,FF9900&chds=-3.333,160,-3.333,160,-1.667,100&chd=t:10,50,60,80,40,60,30|50,60,85,40,30,40,30|40,70,90,45,33,43,34&chtt=Relative+training+time+to+other+athletes" width="800" height="200" alt="Relative training time to other athletes" />';
	echo form_close();
}
else
{
	redirect(login/userLogin);
}
?>