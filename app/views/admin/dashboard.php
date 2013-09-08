<style type="text/css">
	.schedules .delete { padding: 0; line-height: initial; }
	.schedules form { margin-bottom: 0; }
	.content-wrapper { margin-top: 10px; }
	.table-hover tbody tr:hover > td, .table-hover tbody tr:hover > th { background-color: #EBEBEB; }
</style>

<div class="container">
	<div class="span1 pull-right">
		<form class="inline" method="POST">
			<?php if ($settings && $settings->streaming) : ?>
		    	<button type="submit" class="btn btn-primary active">
			        <i class="icon-compass icon-white icon-3x"></i>
			        <br />
		        	<input type="hidden" name="settings[streaming]" value="0" />
		        	<h4><strong>Deactivate Streaming Mode</strong></h4>
		    	</button>
			<?php else : ?>
			<button type="submit" class="btn btn-primary">
			        <i class="icon-compass icon-white icon-3x"></i>
			        <br />
				<input type="hidden" name="settings[streaming]" value="1" />
		        	<h4><strong>Activate Streaming Mode</strong></h4>
	        	</button>
			<?php endif ?>
		</form>
	</div>
</div>