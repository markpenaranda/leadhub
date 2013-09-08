<canvas id="dailyUserOverview" height="400" width="600"></canvas>
<div class="box-container">
	<div class="box box-1">&nbsp;</div>Male Viewers
</div>
<div class="box-container">
	<div class="box box-2">&nbsp;</div>Female Viewers
</div>
			
			<script>

		var donutData 	= [{
					value: <?=Analytics::getUsersBySex($episode['youtube_url'], "male")?>,
					color:"#F7464A" //below 18
				},
				{
					value : <?=Analytics::getUserCountByAge($episode['youtube_url'], "female")?>,
					color : "#46BFBD" //18+
				}];
		var myLine 		= new Chart(document.getElementById("dailyUserOverview").getContext("2d")).Doughnut(donutData);
	
	</script>