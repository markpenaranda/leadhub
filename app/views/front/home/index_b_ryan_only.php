<style type="text/css">
	/* defaullt */
	.wrapper { background: #fff; margin: 0px 0 20px; padding: 20px; }

	.wrapper .show-border .show-header { display: block; margin-bottom: 15px; }
	.wrapper .show-border .show-header .title { font-family: 'open_sansbold'; font-size: 16px; }
	.wrapper .show-border .show-header .input { color: #999; font-size: 12px; }

	.wrapper .show-border { background: #f2f2f2; padding: 15px; }
	.wrapper .show-border .show-item { margin-left: 7px; width: 290px; padding: 5px; float: left; display: block; }
	.wrapper .show-border .show-item img { width: 100%; margin-bottom: 10px; }
	.wrapper .show-border .show-item .show-title a { font-family: 'open_sansbold'; }
	.wrapper .shows .time-slot { position: relative; top: -35px; right: -5px; font-weight: bold; color: #fff; background-color: #30abe2; padding: 5px 10px; font-size: 15px; }
	.wrapper .shows .episode-time{ font-family: 'open_sansbold'; position : absolute; background-color: #0088cc; padding:10px; color:white; margin-top:180px; margin-left:210px; min-width: 60px; }
</style>

<div class="container">
	<div class="wrapper">
		<div class="row-fluid">
			<!-- shows -->
			<div class="span8 shows">
				<!-- video info -->
				<!-- shows schedules -->
				<div class="show-border clearfix">
					<!-- show header -->
					<div class="show-header clearfix filter">
						<p class="title">Show Schedules</p>
						<!-- date picker -->
						<span class="input pull-right">
							Date 
							<span class="input-append date" id="date-filter" data-date="<?php echo date('Y-m-d') ?>" data-date-format="yyyy-mm-dd" >
								<input class="span8" size="16" type="text" value="<?php echo date('Y-m-d') ?>" />
								<span class="add-on"><i class="icon-calendar"></i></span>
							</span>
						</span>
					</div>
					<!-- videos list -->
					<div id="show-list" class="show-list">
						<!-- show item -->
						<?php echo $episodes; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div id="advisory" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="advisory-label" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="advisory-label alert alert-info" style="color: #3a87ad;">Advisory!</h3>
	</div>
	<div class="modal-body">
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
		<button id="accept-reload" class="btn btn-primary">Yes</button>
	</div>
</div>
<script type="text/javascript" src="/assets/scripts/jwplayer.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/styles/datepicker.css" />
<script type="text/javascript" src="/assets/scripts/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	$(function() {
		$('#date-filter').datepicker({
			onRender: function(date) {
				return date;
			}
		}).on('changeDate', function(ev) {
				$("#show-list").html('<div style="width:100%;"><img src="/assets/images/loading.gif" style="margin:auto"></div>');
			var date = $("#date-filter input").val();
			getScheduledEpisodes(date);
		});
		$('#date-filter').datepicker({
			format: 'yyyy-mm-dd'
		});

	getScheduledEpisodes('');

	});

	function getScheduledEpisodes(date){
			$.post("/episodes/schedule", {'date' : date}, function(data){
				if(data != ""){
					$("#show-list").html(data);
				}
				else{
						$("#show-list").html('<span style="margin:auto"><i class="icon-info-sign"></i><i>No Scheduled Episodes Yet</i></span>');
				}
			});
	}
	
</script>