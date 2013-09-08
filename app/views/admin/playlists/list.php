<style type="text/css">
	.shows .delete { padding: 0; line-height: initial; }
	.shows form { margin-bottom: 0; }
	.content-wrapper { margin-top: 10px; }
	.table-hover tbody tr:hover > td, .table-hover tbody tr:hover > th { background-color: #EBEBEB; }
</style>

<div class="well container content-wrapper">
	 <div class="row-fluid">
	        <legend class="pull-right">
	        	<h3 class="title pull-left">Playlist</h3>
			<div class="btn-toolbar pull-right">
				<a href="/admin/playlist/create" class="btn pull-right">Add Video</a>
				<!-- <button class="btn">Import</button> -->
				<!-- <button class="btn">Export</button> -->
			</div>
		</legend>
	</div>
	<table class="table table-hover shows">
		<thead>
			<tr>
				<th>Order</th>
				<th>Title</th>
				<th>Youtube URL</th>
				<th>Image</th>
				<th>Move to Bottom</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php $count = 0 ?>
			<?php foreach($playlist as $list) : ?>
			<?php $count++ ?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $list->video['title'] ?></td>
				<td><?php echo $list->video['youtube_url'] ?></td>
				<td><a target="_blank" href="<?php echo Video::generateImageUrl($list->video['youtube_url']) ?>"><i class="icon-picture"></i></a></td>
				<td>
					<form method="POST" action="<?php echo '/admin/playlist/'.$list->_id ?>" >
						<input type="hidden" name="_method" value="PUT" />
						<button type="submit" class="btn-link delete"><i class="icon-arrow-down"></i></button>
					</form>
				<td>
					<form method="POST" action="<?php echo '/admin/playlist/'.$list->_id ?>" >
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