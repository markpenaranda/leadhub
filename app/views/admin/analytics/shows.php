<style type="text/css">
.padded {padding:10px;}
</style>
<div class="padded">
	<div class="row-fluid">
		<div class="span8 offset2">
			<h3>Tabular Analytics</h3>
			<table class="table-hover table">
				<thead>
					<tr>
						<th>Show</th>
						<th>Total Views</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($shows as $show):?>
						<tr>
							<td><?=$show->name?></td>
							<td><?=Analytics::getTotalViews($show->slug)?></td>
							<td><a class="btn btn-primary btn-small" href="/admin/analytics/show/<?=$show->slug?>" target="_blank"><i class="icon-eye-open">&nbsp;</i>View Analytics</a></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>