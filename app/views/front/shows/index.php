<style>
	.show .container .wrapper{
		background: #FFF;
		padding : 20px;
		margin : 20px 0;
	}

	.show .container .decscription-handle-bar{
		padding:10px;
	}
	.show .container .decscription-handle-bar .description-title{
		font-size: 24px;
		line-height: 24px;
		font-family: 'open_sansbold';
	}
	.show .container .decscription-handle-bar p{
		font-size: 16px;
		line-height: 160%;
	}



	.watching .watching-box { border: 2px #30abe2 solid; }
	.watching .watching-box .caption { 
		background: #30abe2; 
		color: #fff; 
		display: block;
		font-family: 'open_sansbold'; 
		padding: 7px; 
		text-align: center; 
	}
	.watching{padding:10px;}
	.watching .watching-box .content { padding: 15px; text-align: center; }
	 .watching .watching-box .content .people { 
		background: #333; 
		display: block; 
		float: left;
		margin-bottom: 3px;
		margin-left: 3px; 
		width: 50px;
		height: 50px;
	}
	.episodes-handle-bar .span8 {  padding: 15px;  background: #f2f2f2; margin-top: 20px; padding: 15px; }
	.episodes-handle-bar .span8 .show-header { display: block; margin-bottom: 15px; }
	.episodes-handle-bar .span8 .show-header .title { font-family: 'open_sansbold'; font-size: 16px; }
	.episodes-handle-bar .span8 div.list  p.show-title { margin-top: 5px; font-family: 'open_sansbold'; }
	.episodes-handle-bar .span8 div.list {background-color: #F2F2F2 !important;}
	
</style>
<?php foreach ($show as $details) :

 ?>
<div class="container">
	<!-- carousel -->
	<?php echo isset($carousel) ? $carousel : null; ?>
	<div class="wrapper">
		
		<div class="row-fluid">
			<div class="span12" style="text-align:center;">
							<img src="<?php echo $show->getTCardImageUrl()?>"/>
			</div>
		</div>
		<div class="row-fluid decscription-handle-bar">
			<div class="span8">
				<h3><?php echo $details['name']; ?></h3>
				<p><em><?php echo $details['description']; ?></em></p>	</div>
		</div>
		
		<div class="row-fluid episodes-handle-bar">
			<div class="span8 ">
					<div class="show-header clearfix">
						<p class="title">List of Episodes</p>
					</div>

				<div class="list">
					
				<?php foreach($details['videos'] as $episode): ?>

					<div class="span4">
						
								<a href="/play/<?php echo $episode['youtube_url']; ?>"><img src="<?=Show::getShowByVideoSlug($episode['youtube_url'])->getVideoYoutubeUrl($episode['youtube_url'])?>" class="img-polaroid"/></a>
								<p class="show-title"><a href="/play/<?php echo $episode['youtube_url']; ?>"><?php echo $episode['title']; ?></a></p>
								<p><?php echo Str::limit($episode['description'],140,'<a href="/play/"' . $episode['youtube_url'] . '">..see more</a>'); ?></p>
								<p class="show-hits">
								<?php $views = Analytics::getViews(Show::getShowByVideoSlug($episode['youtube_url'])->slug, $episode['youtube_url']);
									echo number_format($views, 0, ".", ",");
								?> views</p>
							
						
					</div>
				<?php endforeach; ?>		
				</div>
			</div>
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
<?php endforeach; ?>


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