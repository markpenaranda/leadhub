<div style="padding-top:40px;">
	<div class="row-fluid">
		<div class="span8 offset2 well">
			<h3>Tag List</h3>
			<table class="table-condensed table-hover">
				<thead>
					<tr>
						<th>Tag</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($tags as $tag):?>
					<tr>
						<td><?=$tag?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>