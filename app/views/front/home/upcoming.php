<style type="text/css">
	/* defaullt */
	.upcoming .wrapper { background: #fff; margin: 20px 0 20px; padding: 20px; }
	.upcoming .carousel { margin-bottom:  0; margin-top: 20px; }
	.upcoming .wrapper .shows-mid .show-border { background: #f2f2f2; padding: 15px; }
	.upcoming .wrapper .shows-mid .show-border .show-item img { margin-bottom: 15px; width: 100%; }
	.upcoming .wrapper .shows-mid .show-border .show-item .show-title { font-family: 'open_sansbold'; }

	.upcoming .wrapper .shows-watching { margin-top: 20px; }
	.upcoming .wrapper .shows-watching .shows .show-border { background: #f2f2f2; padding: 15px; }
	.upcoming .wrapper .shows-watching .shows .show-border .show-item { 
		display: block; 
		float: left; 
		margin-bottom: 10px;
		padding: 10px;
		margin-left: 7px; 
		width: 290px; }
	.upcoming .wrapper .shows-watching .shows .show-border .show-item  img{}
	.upcoming .wrapper .shows-watching .shows .show-border .show-item .show-title { font-family: 'open_sansbold'; margin-top: 10px; }
	.upcoming .wrapper .shows-watching .watching .watching-box { border: 2px #30abe2 solid; }
	.upcoming .wrapper .shows-watching .watching .watching-box .caption { 
		background: #30abe2; 
		color: #fff; 
		display: block;
		font-family: 'open_sansbold'; 
		padding: 7px; 
		text-align: center; 
	}

	.upcoming .wrapper .shows-watching .watching .watching-box .content { padding: 15px; text-align: center; }
	.upcoming .wrapper .shows-watching .watching .watching-box .content .people { 
		background: #333; 
		display: block; 
		float: left;
		margin-bottom: 3px;
		margin-left: 3px; 
		width: 50px;
		height: 50px;
	}

</style>
<div class="container">
	<div class="wrapper">
		<!-- shows & watching -->
		<div class="row-fluid shows-watching">
			<!-- shows -->
			<div class="span8 shows">
				<div class="show-border clearfix">
								
					<div class="row-fluid show-rows">
						<?php foreach($shows as $show): 
								if(isset($show->images)):
								?>
							<div class="span6 show-item">
							<?php 	foreach ($show->images as $image) :
		 								if($image['enabled'] == '1'): ?>
											
												<a href="/show/<?php echo $show->slug; ?>"><img src="<?php echo Image::getImageSize($image['path'], 290, 163); ?>" alt="picture" class="img-polaroid"/></a>
										
								<?php	endif;
									endforeach; ?>
								<p class="show-title"><a href="/show/<?php echo $show->slug; ?>"><?php echo $show->name; ?></a></p>
								<p><?php echo Str::limit($show->description,140,'<a href="/show/'.$show->slug.'">..see more</a>');  ?></p>
							</div>
						<?php 
							endif;
						endforeach; ?>
					</div>
												
				</div>
			</div>
			<!-- chat -->
			<div class="span4 watching">
				<div class="watching-box">
					<div class="caption">WHO'S WATCHING</div>
					<div class="content clearfix">
						<!-- people -->
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<script type="text/javascript">
	<?php $userData = array() ?>
	<?php $userData['room'] = isset($video_url) ? $video_url[4] :  base64_encode('public'); ?>
	var userFb   = null;
	var userData = <?php echo '"' . base64_encode(json_encode($userData)) . '";'; ?>
</script>

<script type="text/javascript" src="http://106.186.25.188:8888/socket.io/socket.io.js"></script>
<script type="text/javascript" src="/assets/scripts/chat.js"></script>
<script type="text/javascript" src="/assets/scripts/emoticons.js"></script>
<script type="text/javascript" src="/assets/scripts/jwplayer.js"></script>
<link rel="stylesheet" href="/assets/styles/emoticons.css">