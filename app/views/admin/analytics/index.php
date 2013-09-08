<script type="text/javascript" src="/assets/scripts/chart.js"></script>
<style type="text/css">
.padded { padding:10px;}
</style>

<div class="padded">
	<div class="row-fluid">
			<div class="span8 offset2">
				<div class="alert alert-info">
					The total view is listed here in the analytics. To see each episode's analytics, please visit the corresponding page for each show
				</div>
			</div>
			<canvas id="canvas" height="450" width="1200"></canvas>
	<script>

		var barChartData = {
			labels : [
				<?php foreach($shows as $show): ?>
					"<?=$show->name?>",
				<?php endforeach;?>
			],
			datasets : [
				{
					fillColor : "rgba(209,25,25,0.5)",
					strokeColor : "rgba(138,19,19,1)",
					data : [
						<?php foreach($shows as $show): ?>
							<?=Analytics::getTotalViews($show->slug)?>,
						<?php endforeach;?>
					]
				},
				
			]
			
		}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
	
	</script>
	</div>
</div>

