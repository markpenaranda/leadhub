<style type="text/css">
	/* login */
	.play {  font-family: 'open_sansbold'; }
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
		height: 240px;
		margin-left: 12px; 
		margin-top: 10px; 
		width: 185px; 
	}
	.play .wrapper .shows .show-border .show-list .show-item p { margin-top: 5px; font-family: 'open_sansbold'; }
</style>

<div class="container">
	<div class="wrapper">
		<div class="row-fluid">
			<!-- shows -->
			<div class="span8 shows">
				<!-- video -->
				<div class="video">
					<!-- ustream -->
			
				<?php $title = $episode['title']; ?>
				<?php $desc = $episode['description']; ?>
					<div class="stream-vid" id="stream-vid">
					</div>
					<script type="text/javascript">
						var credited = <?php echo !$action && !$fb_script && Session::get('user') ? 1 : 0 ?>;
						$(function () {
							function onPlay () {
								if(credited) return;
								<?php if ($action && $action->type == 'like') : ?>
								$("#credit-modal").modal("show");
								<?php elseif ($action && $action->type == 'share') : ?>
								FB.ui(
								{
									method: "feed",
									name: "PinoyrealTV",
									link: "<?php echo URL::current() ?>",
									picture: "<?php echo Video::generateImageUrl($episode['youtube_url']) ?>",
									caption: <?php echo json_encode($episode['title']) ?>,
									description: <?php echo json_encode($episode['description']) ?>
								},
									function(response) {
										if (response && response.post_id) {
											console.log('thanks for sharing!');
											//send the ajax that the user has performed the credited action
										    	var data = {
										    		"_method": "PUT",
										    		"type": "like",
										    		"actionId": "<?php echo $action->_id ?>"
										    	};

										    	$.post(null, data, function(response) {
										    		if(response.hasOwnProperty('success') && response.success) {
										    			$("#credit-modal").modal("hide");
										    			credited = true;
										    		}
										    	});
										} else {
											console.log('Please share to play the video!');
										}
									}
								);
								<?php else : ?>
								$("#notifModal").modal("show");
								<?php endif; ?>

								this.stop();
							}

							function onBeforePlay () {
								if(credited) return;
								this.stop();
							}

							jwplayer("stream-vid").setup({
								file: "http://www.youtube.com/watch?v=<?php echo $episode['youtube_url']; ?>",
								height: 360,
								width: "100%",
								events: {
									onDisplayClick: onPlay,
									onBeforePlay: onBeforePlay
								}
							})
							.onReady(function(e) {
								// $(".jwlogo").attr('src', '/assets/images/player-logo.png');
								// $(".jwlogo").click(function (e) {
								// 	window.top.location.href = 'http://pinoyreal.tv';
								// });
							});
						});
					</script>
				</div> 
				<!-- video info -->
				<div class="video-info">
					<p class="title"><?php echo $title; ?></p>
					<p class="desc">
						<?php echo $desc; ?>
					</p>
				</div>
				<!-- shows schedules -->
				<div class="show-border clearfix">
					<!-- show header -->
					<div class="show-header clearfix">
						<p class="title">List of Episodes</p>
	 
					</div>
					<!-- show list -->
					<div class="show-list clearfix">
						<!-- show item -->
					<?php foreach($videos as $key => $video) : ?>
						<div class="show-item">
							<a href="/play/<?php echo $video['youtube_url']; ?>"><img src="<?=Show::getShowByVideoSlug($episode['youtube_url'])->getVideoYoutubeUrl($video['youtube_url'])?>" width="100%" class="img-polaroid"/></a>
							<p>
								<a href="/play/<?php echo $video['youtube_url']; ?>"><?php echo $video['title']; ?></a>
							</p>
							<p class="show-hits">
								<?php $views = Analytics::getViews(Show::getShowByVideoSlug($episode['youtube_url'])->slug, $video['youtube_url']);
									echo number_format($views, 0, ".", ",");
								?> views</p>
						</div>	
					<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php echo View::make('front/blocks/chat')->with('video_url', $video['youtube_url']); ?>
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
<?php echo $fb_script ? $fb_script : null; ?>
<script type="text/javascript" src="/assets/scripts/jwplayer.js"></script>