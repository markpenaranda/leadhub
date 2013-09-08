<style type="text/css">
	.categories .delete { padding: 0; line-height: initial; }
	.categories form { margin-bottom: 0; }
	.content-wrapper { margin-top: 10px; }
	.table-hover tbody tr:hover > td, .table-hover tbody tr:hover > th { background-color: #EBEBEB; }
</style>

<div class="well container content-wrapper">
	<div class="row-fluid">
	        <legend class="pull-right">
	        	<h3 class="title pull-left">Categories</h3>
			<div class="btn-toolbar pull-right">
				<a href="/admin/categories/create" class="btn pull-right">Create Category</a>
			</div>
		</legend>
	</div>
	<table class="table table-hover categories">
		<thead>
			<tr>
				<th>Name</th>
				<th>Slug</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($categories as $category) : ?>
			<?php echo $category->getHtml() ?>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>