<!DOCTYPE html>
<html lang="en">
<head>
<title>sample dynamic select list</title>
<link rel = "stylesheet" type="text/css" href = "<?php echo base_url(); ?>application/assets/style.css" /></head>

<body>
Double click on any cell. Then enter your own text and then tab out or click on other place.
<table class = "sortable resizable editable">
<tr>
<th>Row1 cell1</th>
<th>row1 cell2</th>
</tr>
<tr>
<td>Row2 cell1</td>
<td>row2 cell2</td>
</tr>
</table>

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
			TableKit.options.editAjaxURI = 'post/';
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

