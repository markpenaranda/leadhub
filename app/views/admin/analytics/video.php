<style>
	.padded{padding:10px;}
	.box{ width:16px; height:16px; display: inline-block; margin:4px;}
	.box-1{background-color: #F7464A;}
	.box-2{background-color: #46BFBD;}
	.box-3{background-color: #FDB45C;}
	.box-4{background-color: #949FB1;}
	.box-container{padding:10px;}
</style>
<script type="text/javascript" src="/assets/scripts/chart.js"></script>
<div class="padded">
	<div class="row-fluid">
		<div class="span6 well">
			<div class="btn-group" style="padding-bottom:10px;">
				<button class="btn active">Day</button>
				<button class="btn">Month</button>
				<button class="btn">Year</button>
			</div>
			<h3>User Viewership</h3>
			<div class="alert alert-info">
				Click on the buttons below to see each analytics for each criterion.
			</div>
			<div class="btn-group" style="padding-bottom:10px;">
				<a class="btn btn-mini <?=$viewership_filter == "age" ? "active" : "btn-primary"?>" href="/admin/analytics/video/<?=$show_slug?>/<?=$episode['youtube_url']?>"><i class="icon-list-alt">&nbsp;</i>Age</a>
				<a class="btn btn-mini <?=$viewership_filter == "sex" ? "active" : "btn-primary"?>" href="/admin/analytics/video/<?=$show_slug?>/<?=$episode['youtube_url']?>/sex"><i class="icon-user">&nbsp;</i>Sex</a>
				<a class="btn btn-mini <?=$viewership_filter == "religion" ? "active" : "btn-primary"?>" href="/admin/analytics/video/<?=$show_slug?>/<?=$episode['youtube_url']?>/religion"><i class="icon-home">&nbsp;</i>Religion</a>
				<a class="btn btn-mini <?=$viewership_filter == "visit-types" ? "active" : "btn-primary"?>" href="/admin/analytics/video/<?=$show_slug?>/<?=$episode['youtube_url']?>/visit-types"><i class="icon-retweet">&nbsp;</i>Visit Types</a>
				<!-- <button class="btn btn-mini btn-primary"><i class="icon-home">&nbsp;</i>Religion</button>
				<button class="btn btn-mini btn-primary"><i class="icon-pencil">&nbsp;</i>Education</button> -->
			</div>
			<?php if($viewership_filter == "age") echo View::make('admin.analytics.blocks.age_chart')->with(array('episode'=>$episode,'show_slug'=>$show_slug))?>
			<?php if($viewership_filter == "sex") echo View::make('admin.analytics.blocks.sex_chart')->with(array('episode'=>$episode,'show_slug'=>$show_slug))?>
			<?php if($viewership_filter == "visit-types") echo View::make('admin.analytics.blocks.visits_chart')->with(array('episode'=>$episode, 'show_slug'=>$show_slug))?>
		</div>
		<div class="span6 well">
			<h3>Total Unique Visits</h3>
		</div>
	</div>
</div>
