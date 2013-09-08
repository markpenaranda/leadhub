<canvas id="dailyUserOverview" height="400" width="600"></canvas>
<div class="box-container">
	<div class="box box-1">&nbsp;</div>Unique Visitors
</div>
<div class="box-container">
	<div class="box box-2">&nbsp;</div>Recurring Visitors
</div>
<div class="box-container">
	<div class="box box-3">&nbsp;</div>Facebook Visitors
</div>
<script>

		var donutData 	= [{
					value: <?=count(Analytics::getUsers($show_slug, $episode['youtube_url']))?>,
					color:"#F7464A" //below 18
				},
				{
					value : <?=count(Analytics::getUsers($show_slug, $episode['youtube_url'], null, true))?>,
					color : "#46BFBD" //18+
				},
				{
					value : <?=count(Analytics::getFacebookUsers($show_slug, $episode['youtube_url']))?>,
					color : "#FDB45C" //35+
				}];
		var myLine 		= new Chart(document.getElementById("dailyUserOverview").getContext("2d")).Doughnut(donutData);
	
	</script>