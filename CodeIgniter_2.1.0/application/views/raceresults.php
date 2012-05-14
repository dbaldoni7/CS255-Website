<!DOCTYPE html>
<html lang="en">
<head>
<title>sample dynamic select list</title>
<link rel = "stylesheet" type="text/css" href = "<?php echo base_url(); ?>application/assets/style.css" /></head>

<body>
<?php

if ($this->session->userdata('logged_in'))
{
	$this->load->helper('form');
	
	echo "<h1>Races</h1>";
	if ($this->session->userdata('admin') == 1) 
	{
		?>
		<table class = "sortable resizable editable">
		
		<?
				echo'<tr>
						<th>Athlete</th>
						<th>Time (sec)</th>
				</tr>';
			
			
			foreach($athletes->result() as $row){
				echo '<tr>
					<td>'.$row->name.'</td>';
					$t=FALSE;
					if(isset($raceresults)){
						foreach($raceresults->result() as $row2){
								if($row->userID == $row2->userID){
									echo '<td>'.$row2->result.'</td>
									</tr>';
									$t=TRUE;
								}	
						}
					}
				if(!$t){
					echo '<td> - </td>
							</tr>';
				}
			}
		?>
		

		</table>
		
<?php
	echo form_open('loggedinathlete/races');
	echo"</br>";
	echo form_submit('back', 'Back');
	echo form_close();
	}
}
else
{
	redirect(login/userLogin);
}
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.2/prototype.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>application/assets/fabtabulous.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>application/assets/tablekit.js"></script>
		<script type="text/javascript">
			TableKit.Sortable.addSortType(new TableKit.Sortable.Type('status', {
					pattern : /^[New|Assigned|In Progress|Closed]$/,
					normal : function(v) {
						var val = 4;
						switch(v) {
							case 'New':
								val = 0;
								break;
							case 'Assigned':
								val = 1;
								break;
							case 'In Progress':
								val = 2;
								break;
							case 'Closed':
								val = 3;
								break;
						}
						return val;
					}
				}
			));
			TableKit.options.editAjaxURI = '<?php echo base_url(); ?>index.php/loggedinathlete/post';
			TableKit.Editable.selectInput('urgency', {}, [
						['1','1'],
						['2','2'],
						['3','3'],
						['4','4'],
						['5','5']																												
					]);
			TableKit.Editable.multiLineInput('title');
			var _tabs = new Fabtabs('tabs');
			$$('a.next-tab').each(function(a) {
				Event.observe(a, 'click', function(e){
					Event.stop(e);
					var t = $(this.href.match(/#(\w.+)/)[1]+'-tab');
					_tabs.show(t);
					_tabs.menu.without(t).each(_tabs.hide.bind(_tabs));
				}.bindAsEventListener(a));
			});
		</script>
</body>
</html>