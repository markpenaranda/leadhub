<style type="text/css">
	p.show-title{margin:10px;}
</style>

<div class="well">
 
<div id="myCarousel" class="carousel slide">
 
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
 
<!-- Carousel items -->
<div class="carousel-inner">
<?php 
	for($i = 0; $i < count($latest_espiodes); $i += 4):
		$sliced = array_slice($latest_espiodes, $i, 4);
	?>
		<div class="item <?=$i == 0 ? 'active' : ' '?>">
			<div class="row-fluid">
<?php	foreach($sliced as $slice): ?>	
				<div class="span3">
					<a href="/play/<?=$slice['youtube_url']?>" class="thumbnail">
						<img src="http://img.youtube.com/vi/<?php echo $slice['youtube_url']; ?>/0.jpg" alt="Image" style="max-width:100%;" />
					</a>
					<p class="show-title"><a href="/play/<?php echo $slice['youtube_url']; ?>"><?php echo $slice['title']; ?></a></p>
				</div>			
<?php 	endforeach; ?>
			</div><!--/row-fluid-->
		</div><!--/item-->	
<?php endfor;?>	
</div><!--/carousel-inner-->
 
<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div><!--/myCarousel-->
 
</div><!--/well-->
 
<!-- This is just a little bit of custom CSS code to enhance things. Feel free to place this in your main CSS file. I've commented to say what each bit does. --> 
<style type="text/css">
/* Removes the default 20px margin and creates some padding space for the indicators and controls */
.carousel {
	margin-bottom: 0;
	padding: 0 40px 30px 40px;
}
/* Reposition the controls slightly */
.carousel-control {
	left: -12px;
}
.carousel-control.right {
	right: -12px;
}
/* Changes the position of the indicators */
.carousel-indicators {
	right: 50%;
	top: auto;
	bottom: 0px;
	margin-right: -19px;
}
/* Changes the colour of the indicators */
.carousel-indicators li {
	background: #c0c0c0;
}
.carousel-indicators .active {
background: #333333;
}
</style>
 

<script type="text/javascript">
$(document).ready(function() {
	$('#myCarousel').carousel({
	interval: 10000
	})
});
</script>