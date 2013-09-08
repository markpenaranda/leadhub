<style type="text/css">
	/* defaullt */
	.home .wrapper { background: #fff; margin: 0px 0 20px; padding: 20px; }
	.home .carousel { margin-bottom:  0; margin-top: 20px; }
	.home .wrapper .shows-mid .show-border { background: #f2f2f2; padding: 15px; }
	.home .wrapper .shows-mid .show-border .show-item img { margin-bottom: 15px; width: 100%; }
	.home .wrapper .shows-mid .show-border .show-item .show-title { font-family: 'open_sansbold'; }

	.home .wrapper .shows-watching { margin-top: 20px; }
	.home .wrapper .shows-watching .shows .show-border { background: #f2f2f2; padding: 15px; }
	.home .wrapper .shows-watching .shows .show-border .show-item { 
		display: block; 
		float: left; 
		margin-bottom: 10px;
		margin-left: 7px; 
		padding:5px;
		width: 290px; }
	.home .wrapper .shows-watching .shows .show-border .show-item .show-title { font-family: 'open_sansbold'; margin-top: 10px; }
    	
    	.play .wrapper { background: #fff; margin: 20px 0; padding: 20px; }
	.play .blue { color: #0087e3; }
	.play .wrapper .shows .video iframe { border: 0px none transparent; height: 360px; width: 100% }
	.play .wrapper .shows .video #stream-vid { border: 0px none transparent; height: 360px; width: 100% }
	.play .wrapper .shows .video-info { margin-top: 15px; }
	.play .wrapper .shows .video-info .title { color: #30abe2; font-family: 'open_sansbold'; }
	.play .wrapper .shows .video-info .desc { font-size: 13px; }

	.play .wrapper .shows .show-border { background: #f2f2f2; margin-top: 20px; padding: 15px; } 
	.play .wrapper .shows .show-border .show-header { display: block; margin-bottom: 15px; }
	.play .wrapper .shows .show-border .show-header .title { font-family: 'open_sansbold'; font-size: 16px; }
	.play .wrapper .shows .show-border .show-header form .input { color: #999; font-size: 12px; }

	.play .wrapper .shows .show-border .show-list { display: block; margin-top: 5px; }
	.play .wrapper .shows .show-border .show-list .show-item { 
		display: block; 
		float: left; 
		height: 200px;
		margin-left: 12px; 
		margin-top: 10px; 
		width: 185px; 
	}
	.play .wrapper .shows .show-border .show-list .show-item p { margin-top: 5px; font-family: 'open_sansbold'; }

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
	.wrapper .shows .episode-time{ font-family: 'open_sansbold'; position : absolute; background-color: #0088cc; padding:10px; color:white; margin-top:100px; margin-left:55px; min-width: 60px; }
	.wrapper .shows .sched-picker { margin-left: 25%;}
</style>

<div class="container">
	<!-- carousel -->
	
	<div class="wrapper">
		<div class="row-fluid">
			<!-- shows -->
			<div class="span8 shows">
				<!-- video -->
				<div class="video">
					<?php if ($settings->streaming) : ?>
						<iframe class="stream-vid" src="http://www.ustream.tv/embed/14848187" scrolling="no" frameborder="0"></iframe>
					<?php else : ?>
					<div class="stream-vid" id="stream-vid">Loading...</div>
					<script type="text/javascript">
						$(function () {
							jwplayer("stream-vid").setup({
								autostart: true,
								height: 360,
								width: "100%",
								playlist: <?php echo $playlist ?>
							})
							.onReady(function(e) {
								$(".jwlogo").attr('src', '/assets/images/player-logo.png');
								$(".jwlogo").click(function (e) {
									window.top.location.href = 'http://pinoyreal.tv';
								});

								var playing = jwplayer().getPlaylistItem();
								$('.video-info .title').html(playing.details.title);
								$('.video-info .desc').html(playing.details.description);
							})
							.onPlay(function(e) {
								var playing = jwplayer().getPlaylistItem();
								$('.video-info .title').html(playing.details.title);
								$('.video-info .desc').html(playing.details.description);
							});
						});
					</script>
					<?php endif ?>
				</div>
				<!-- video info -->
				<div class="video-info">
					<p class="title"></p>
					<p class="desc"></p>
					<!-- social share-->
					<div class="social-share">
						<span class='st_fblike_hcount' displayText='Facebook Like'></span>
						<span class='st_twitter_hcount' displayText='Tweet'></span>
						<span class='st_googleplus_hcount' displayText='Google +'></span>
						<span class='st_pinterest_hcount' displayText='Pinterest'></span>
					</div>
				</div>
				<!-- shows schedules -->
				<div class="show-border clearfix">
					<!-- show header -->
					<div class="show-header clearfix filter">
						<p class="title">Show Schedules</p>
						<!-- date picker -->
						<div class="pull-left">
							<a href="#" id="yesterday"  class="date-mover" data-value="">&lt&nbsp;Yesterday</a>
						</div>
						<div class="sched-picker pull-left">
						<span class="input pull-right">
							Date 
							<span class="input-append date" id="date-filter" data-date="<?php echo date('Y-m-d') ?>" data-date-format="yyyy-mm-dd" >
								<input class="span8" id="sched-date-input" size="16" type="text" value="<?php echo date('Y-m-d') ?>" />
								<span class="add-on"><i class="icon-calendar"></i></span>
							</span>
						</span>
						</div>
							<div class="pull-right">
							<a href="#" id="tomorrow" class="date-mover" data-value="">Tomorrow&nbsp;&gt</a>
						</div>
					</div>
					<!-- videos list -->
					<div id="show-list" class="show-list">
						<!-- show item -->
						<?php echo $episodes; ?>
					</div>
				</div>
			</div>
			<?php echo View::make('front/blocks/chat') ?>
		</div>

		
		<!-- shows & watching -->
		<div class="row-fluid shows-watching">

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
		var chosenDate = $('#date-filter').datepicker({
			onRender: function(date) {
				return date;
			}
		}).on('changeDate', function(ev) {
			var tomorrowDate = new Date(ev.date);
			var yesterdayDate = new Date(ev.date);
				$("#show-list").html('<div style="width:100%;"><img src="/assets/images/loading.gif" style="margin:auto"></div>');
			var date = $("#date-filter input").val();
			 tomorrowDate.setDate(tomorrowDate.getDate() + 1);
			 yesterdayDate.setDate(yesterdayDate.getDate() - 1);
			$("#yesterday").attr("data-value", yesterdayDate);
			$("#tomorrow").attr("data-value", tomorrowDate);
			getScheduledEpisodes(date);
		}).data('datepicker');

		$(".date-mover").on('click', function(){
			var goToDate = $(this).attr('data-value');
			var d = new Date(goToDate);
			// console.log(goToDate.getFullYear() + '-' + (goToDate.getMonth()+1) + '-'  + goToDate.getDate());
			chosenDate.setValue(d);
				$("#show-list").html('<div style="width:100%;"><img src="/assets/images/loading.gif" style="margin:auto"></div>');
			var date = $("#date-filter input").val();
			var tomorrowDate = new Date(date);
			var yesterdayDate = new Date(date);
			 tomorrowDate.setDate(tomorrowDate.getDate() + 1);
			 yesterdayDate.setDate(yesterdayDate.getDate() - 1);
			$("#yesterday").attr("data-value", yesterdayDate);
			$("#tomorrow").attr("data-value", tomorrowDate);
			getScheduledEpisodes(date);
			return false;
		});


		$("#sched-date-input").on('change', function(){

		});

		$('#date-filter').datepicker({
			format: 'yyyy-mm-dd'
		});

	getScheduledEpisodes('');
	var date = $("#date-filter input").val();
	var tomorrowDate = new Date(date);
	var yesterdayDate = new Date(date);
	tomorrowDate.setDate(tomorrowDate.getDate() + 1);
	yesterdayDate.setDate(yesterdayDate.getDate() - 1);
	$("#yesterday").attr("data-value", yesterdayDate);
	$("#tomorrow").attr("data-value", tomorrowDate);

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