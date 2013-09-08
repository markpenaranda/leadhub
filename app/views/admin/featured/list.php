<style type="text/css">
	.featured .delete { padding: 0; line-height: initial; }
	.featured form { margin-bottom: 0; }
	.content-wrapper { margin-top: 10px; }
	.table-hover tbody tr:hover > td, .table-hover tbody tr:hover > th { background-color: #EBEBEB; }
</style>

<div class="well container content-wrapper">
	<div class="row-fluid">
	        <legend class="pull-right">
	        	<h3 class="title pull-left">Featured</h3>
			<div class="btn-toolbar pull-right">
				<a href="/admin/featured/create" class="btn pull-right">Add Featured</a>
			</div>
		</legend>
	</div>
	<table class="table table-hover featured">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Remove</th>
			</tr>
		</thead>
		<tbody>
			<?php $count = 0 ?>
			<?php foreach($shows as $show) : ?>
			<?php $count++ ?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $show->name ?></td>
				<td>
					<form method="POST" action="<?php echo '/admin/featured/'.$show->_id ?>" >
						<input type="hidden" name="_method" value="DELETE" />
						<button type="submit" class="btn-link delete"><i class="icon-remove"></i></button>
					</form>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(function() {
	});
</script>