<style type="text/css">
	/* defaullt */
	.show .wrapper { background: #fff; margin: 0px 0 20px; padding: 20px; }
	.show .carousel { margin-bottom:  0; margin-top: 20px; }
	.show .wrapper .shows-mid .show-border { background: #f2f2f2; padding: 15px; }
	.show .wrapper .shows-mid .show-border .show-item img { margin-bottom: 15px; width: 100%; }
	.show .wrapper .shows-mid .show-border .show-item .show-title { font-family: 'open_sansbold'; }

	.show .wrapper .shows-watching { margin-top: 20px; }
	.show .wrapper .shows-watching .shows .show-border { background: #f2f2f2; padding: 15px; }
	.show .wrapper .shows-watching .shows .show-border .show-item { 
		display: block; 
		float: left; 
		margin-bottom: 10px;
		margin-left: 7px; 
		width: 290px; }
	.show .wrapper .shows-watching .shows .show-border .show-item .show-title { font-family: 'open_sansbold'; margin-top: 10px; }
	/* .home .wrapper .shows-watching .shows .show-border .show-rows { margin-bottom: 25px; }
	.home .wrapper .shows-watching .shows .show-border .show-rows .show-item img { margin-bottom: 15px; width: 100%; }
	.home .wrapper .shows-watching .shows .show-border .show-rows .show-item .show-title { font-family: 'open_sansbold'; } */

	.show .wrapper .shows-watching .watching .watching-box { border: 2px #30abe2 solid; }
	.show .wrapper .shows-watching .watching .watching-box .caption { 
		background: #30abe2; 
		color: #fff; 
		display: block;
		font-family: 'open_sansbold'; 
		padding: 7px; 
		text-align: center; 
	}

	.show .wrapper .shows-watching .watching .watching-box .content { padding: 15px; text-align: center; }
	.show .wrapper .shows-watching .watching .watching-box .content .people { 
		background: #333; 
		display: block; 
		float: left;
		margin-bottom: 3px;
		margin-left: 3px; 
		width: 50px;
		height: 50px;
	}

   .carousel-indicators {
        position: absolute;
        bottom: 15px;
        left: 45%;
        z-index: 5;
        margin: 0;
        top: initial;
        list-style: none;;
    }

    .carousel-indicators li {
        display: block;
        float: left;
        width: 10px;
        height: 10px;
        margin-left: 11px;
        text-indent: -999px;
        background-color: #999;
        border-radius: 5px;
        cursor: pointer;
    }

    .carousel-indicators .active { background-color: #333; }

    .carousel-inner .item img{ width: 100%; }

    .carousel-caption { top: 0; bottom: initial; background: #dcdcdc; background: rgba(220,220,220,0.8); }
    .carousel-caption p { font-family: 'proxima_novalight'; font-size: 35px; color: #322d2d; line-height: 1em; text-transform: uppercase;}	
    .carousel { background-color: #FFF; padding-top:30px; position: relative;}
    .home .blue { color: #0087e3; }
</style>

<div class="container">
	<?php echo View::make('front/blocks/carousel'); ?>
	<div class="wrapper">
		

		<!-- shows & watching -->
		<div class="row-fluid shows-watching">
			<!-- shows -->
			<div class="span12 shows">
				<div class="show-border clearfix">
								
				<?php foreach ($showTree as $tree) : ?>
					<?php if(count($tree['items'][0]) > 0): ?>
						<div class="show-header clearfix">
						<p class="title"><h3><a href="/categories/<?php echo $tree['slug']; ?>"><?php echo $tree['name']; ?></a></h3></p>
						</div>
						<hr />
						<div class="row-fluid">
						<?php foreach ($tree['items'] as $shows) : ?>
							<?php echo View::make('front/blocks/title_cards')->with(array('shows'=>$shows, 'classes'=>'span4'))?>
						<?php endforeach; ?>
						</div>
				<?php 
					endif;
				endforeach; ?>
												
				</div>
			</div>

		</div>	
	</div>
	<!-- date picker -->
	<!--
	<div class="datepicker dropdown-menu" style="display: block; top: 605px; left: 603.5px;"><div class="datepicker-days" style="display: block;"><table class=" table-condensed"><thead><tr><th class="prev">‹</th><th colspan="5" class="switch">February 2012</th><th class="next">›</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="day  old">29</td><td class="day  old">30</td><td class="day  old">31</td><td class="day ">1</td><td class="day ">2</td><td class="day ">3</td><td class="day ">4</td></tr><tr><td class="day ">5</td><td class="day ">6</td><td class="day ">7</td><td class="day ">8</td><td class="day ">9</td><td class="day ">10</td><td class="day ">11</td></tr><tr><td class="day ">12</td><td class="day ">13</td><td class="day ">14</td><td class="day ">15</td><td class="day ">16</td><td class="day  active">17</td><td class="day ">18</td></tr><tr><td class="day ">19</td><td class="day ">20</td><td class="day ">21</td><td class="day ">22</td><td class="day ">23</td><td class="day ">24</td><td class="day ">25</td></tr><tr><td class="day ">26</td><td class="day ">27</td><td class="day ">28</td><td class="day ">29</td><td class="day  new">1</td><td class="day  new">2</td><td class="day  new">3</td></tr><tr><td class="day  new">4</td><td class="day  new">5</td><td class="day  new">6</td><td class="day  new">7</td><td class="day  new">8</td><td class="day  new">9</td><td class="day  new">10</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev">‹</th><th colspan="5" class="switch">2012</th><th class="next">›</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month active">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev">‹</th><th colspan="5" class="switch">2010-2019</th><th class="next">›</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year active">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span class="year">2019</span><span class="year old">2020</span></td></tr></tbody></table></div></div>	
	-->
</div>

<link href="/assets/styles/movingboxes.css" rel="stylesheet">
<!--[if lt IE 9]>
<link href="css/movingboxes-ie.css" rel="stylesheet" media="screen" />
<![endif]-->
<style type="text/css">
	.mb-panel {
		width: 60%
	}
	.mb-panel img {
		opacity: 0.5;
		filter:alpha(opacity=50);
	}
	.mb-panel.current img {
		opacity: 1;
		filter:alpha(opacity=100);
	}
</style>
<script type="text/javascript" src="/assets/scripts/jquery.movingboxes.js"></script>
<script type="text/javascript" src="/assets/scripts/jquery.easing.1.2.js"></script>
<script type="text/javascript">
	$(function() {
		$('#slider').movingBoxes({
			startPanel   : 1,      // start with this panel
			reducedSize  : 0.5,    // non-current panel size: 80% of panel size
			wrap         : true,   // if true, the panel will "wrap" (it really rewinds/fast forwards) at the ends
			buildNav     : true,   // if true, navigation links will be added
			navFormatter : function(){ return "&#9679;"; } // function which returns the navigation text for each panel
		});
	});
</script>

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