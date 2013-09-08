<style>
	.padded{padding:10px;}
</style>
<script type="text/javascript" src="/assets/scripts/chart.js"></script>

<div class="padded">
	<div class="row-fluid">
		<div class="span12 well">
			<div class="btn-group" style="padding-bottom:10px;">
				<button class="btn active">Day</button>
				<button class="btn">Month</button>
				<button class="btn">Year</button>
			</div>
			<h3>Daily Overview</h3>
			<canvas id="dailyOverviewCanvas" height="150" width="960"></canvas>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6 well">
			<h3>Circle Chart here later</h3>
		</div>
		<div class="span6 well">
			<h3>Per Episode Infographics</h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Episode</th>
							<th>Views</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($show->videos as $video): ?>
							<tr>
								<td><?=$video['title']?></td>
								<td><?=Analytics::getViews($show->slug, $video['youtube_url'])?></td>
								<td><a class="btn btn-primary" href="/admin/analytics/video/<?=$show->slug?>/<?=$video['youtube_url']?>">Show Graphs</a></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
		</div>
	</div>
</div>



<script>

		var barChartData = {
			labels : [
				<?php foreach($show->videos as $video): ?>
					"<?=$video['title']?>",
				<?php endforeach;?>
			],
			datasets : [
				{
					fillColor : "rgba(209,25,25,0.5)",
					strokeColor : "rgba(138,19,19,1)",
					data : [
						<?php foreach($show->videos as $video): ?>
							<?=count(Analytics::getDailyViewsOfVideo($show->slug, $video['youtube_url']))?>,
						<?php endforeach;?>
					]
				},
				
			]
			
		}

	var myLine = new Chart(document.getElementById("dailyOverviewCanvas").getContext("2d")).Bar(barChartData);
	
	</script>