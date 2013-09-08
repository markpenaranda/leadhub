<style type="text/css">
	.featured .delete { padding: 0; line-height: initial; }
	.featured form { margin-bottom: 0; }
	.content-wrapper { margin-top: 10px; }
</style>

<div class="container content-wrapper">
	<a href="/admin/featured/create" class="btn pull-right">Add Featured</a>
	<h2>Featured</h2>
	<table class="table table-bordered table-hover featured">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Add as Featured</th>
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
						<input type="hidden" name="_method" value="PUT" />
						<button type="submit" class="btn-link delete">Add</button>
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