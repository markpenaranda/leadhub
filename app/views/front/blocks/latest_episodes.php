<style type="text/css">
	.latests{position: relative; background: #f2f2f2;}
	.latest-episodes-wrapper{height:312px; overflow: hidden; position: relative;}
	.latest-episodes{position: absolute;}
	.episode-nav { position: absolute; cursor: pointer; top:35%; width: 34px; height: 55px; background-image: url('/assets/images/arrows.png'); background-repeat: no-repeat; cursor: pointer;}
	.episode-prev {  left:-54px; }
	.episode-prev:hover {  background-position: 0px -61px; }
	.episode-next {  right:-54px; background-position: -30px 0px; }
	.episode-next:hover {  background-position: -30px -61px; }
	.latest-episodes .show-item {padding:10px; }
	.latest-episodes .show-item .show-title {height: 40px; overflow: hidden; margin-bottom: 0px;}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		var latestEpisode 	= $(".latest-episodes");
		var episodes 		= $("[uid=show-items]");
		var newLength 		= (290 + 10) * episodes.length;
		var pointer 		= 4;

		//force remove responsiveness TODO
		// episodes.css({
		// 	"width" 	: 	"290px"
		// });
		latestEpisode.css({
			"width" 	: 	newLength
		});

		$(".episode-prev").click(function(){
			// console.log("Pointer is now: "+pointer);
			if(pointer <= 4){
				pointer = 4 // if pointer is less than 0 revert to 0
				latestEpisode.animate({
					"left" : 0
				});
			}else{
				pointer -= 1;
				latestEpisode.animate({
					"left" : '+=' + ((episodes.outerWidth() + 10) * 1 )
				});
			}
		});

		$(".episode-next").click(function(){
			// console.log("Pointer is now: "+pointer);
			if(pointer >= episodes.length){
				pointer = episodes.length; //point cursor to last episode
			}else{
				pointer += 1;
				latestEpisode.animate({
					"left" 	: '-=' + ((episodes.outerWidth() + 10) * 1 )
				});
			}
		});
	});
</script>
<!-- shows mid -->
	<div class="latests">
		<div class="episode-nav episode-prev"></div>
		<div class="episode-nav episode-next"></div>
		<div class="row-fluid shows-mid  latest-episodes-wrapper">
			<!-- show items -->
			<div class="show-border clearfix latest-episodes" style="background:none;">
				<?php foreach ($latest_episodes as $episode) : 
				?>
					<div class="span3 show-item" uid="show-items" style="width:280px;">
						<a href="/play/<?=$episode['youtube_url']?>"><img src="<?=Show::getShowByVideoSlug($episode['youtube_url'])->getVideoYoutubeUrl($episode['youtube_url'])?>" class="img-polaroid" style="height:173px;"/></a>
						<div class="latest-episode-details-container">
							<p class="show-title"><a href="/play/<?php echo $episode['youtube_url']; ?>"><?php echo $episode['title']; ?></a></p>
							<p class="show-hits">
								<?php $views = Analytics::getViews($episode['show_slug'], $episode['youtube_url']);
									echo number_format($views, 0, ".", ",");
								?> views</p>
						</div>
					</div>

				<?php 	endforeach;
				

				 ?>
				
			</div>			
		</div>
	</div>