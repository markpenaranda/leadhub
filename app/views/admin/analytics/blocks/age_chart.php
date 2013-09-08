<canvas id="dailyUserOverview" height="400" width="600"></canvas>
			<div class="box-container">
				<div class="box box-1">&nbsp;</div>Below 18 
			</div>
			<div class="box-container">
				<div class="box box-2">&nbsp;</div>18 - 34 
			</div>
			<div class="box-container">
				<div class="box box-3">&nbsp;</div>35 - 65 
			</div>
			<div class="box-container">
				<div class="box box-4">&nbsp;</div>65+ 
			</div>
			<script>

		var donutData 	= [{
					value: <?=Analytics::getUserCountByAge($episode['youtube_url'],array('floor'=>0,'ceiling'=>17))?>,
					color:"#F7464A" //below 18
				},
				{
					value : <?=Analytics::getUserCountByAge($episode['youtube_url'],array('floor'=>17,'ceiling'=>34))?>,
					color : "#46BFBD" //18+
				},
				{
					value : <?=Analytics::getUserCountByAge($episode['youtube_url'],array('floor'=>34,'ceiling'=>64))?>,
					color : "#FDB45C" //35+
				},
				{
					value : <?=Analytics::getUserCountByAge($episode['youtube_url'],array('floor'=>64,'ceiling'=>100))?>,
					color : "#949FB1" //65+
				}];
		var myLine 		= new Chart(document.getElementById("dailyUserOverview").getContext("2d")).Doughnut(donutData);
	
	</script>