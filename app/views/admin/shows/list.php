<style type="text/css">
	.shows .delete { padding: 0; line-height: initial; }
	.shows form { margin-bottom: 0; }
	.content-wrapper { margin-top: 10px; }
	.table-hover tbody tr:hover > td, .table-hover tbody tr:hover > th { background-color: #EBEBEB; }
</style>

<div class="well container content-wrapper">
	<div class="row-fluid">
	        <legend class="pull-right">
	        	<h3 class="title pull-left">Shows</h3>
			<div class="btn-toolbar pull-right">
				<a href="/admin/shows/create" class="btn pull-right">Create Show</a>
			</div>
		</legend>
	</div>
	<table class="table table-hover shows">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Slug</th>
				<th>Categories</th>
				<th>Banner</th>
				<th>Videos</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php $count = 0 ?>
			<?php foreach($shows as $show) : ?>
			<?php $count++ ?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $show->name ?></td>
				<td><?php echo $show->slug ?></td>
				<td>
					<?php if($show->categories) : ?>
					<?php foreach ($show->categories as $id): ?>
						<div class="categories"><?php echo Category::findOne($id)->name; ?></div>
					<?php endforeach ?>
					<?php endif; ?>
				</td>
				<td><a target="_blank" href="<?php echo $show->getAttribute('images.path') ?>"><i class="icon-picture"></i></a></td>
				<td><a href="<?php echo $show->getVideosUrl() ?>"><i class="icon-film"></i></a></td>
				<td><a href="<?php echo $show->getEditUrl() ?>"><i class="icon-pencil"></i></a></td>
				<td>
					<form method="POST" action="<?php echo '/admin/shows/'.$show->_id ?>" >
						<input type="hidden" name="_method" value="DELETE" />
						<button type="submit" class="btn-link delete"><i class="icon-remove"></i></button>
					</form>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>