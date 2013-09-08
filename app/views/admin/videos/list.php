<style type="text/css">
	.videos .delete { padding: 0; line-height: initial; }
	.videos form { margin-bottom: 0; }
	.list-video { margin-top: 20px; }
	.table-hover tbody tr:hover > td, .table-hover tbody tr:hover > th { background-color: #EBEBEB; }
</style>

<div class="well container list-video">
	<div class="row-fluid">
	        <legend class="pull-right">
	        	<h3 class="title pull-left">Videos</h3>
			<div class="btn-toolbar pull-right">
				<a href="/admin/shows/<?php echo $show_slug ?>/videos/create" class="btn pull-right">Upload Video</a>
			</div>
		</legend>
	</div>
	<table class="table table-hover videos">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Youtube URL</th>
				<th>Image</th>
				<th>Enabled</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php $count = 0 ?>
			<?php if($videos) : ?>
			<?php foreach($videos as $video) : ?>
			<?php $count++ ?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $video->title ?></td>
				<td><a target="_blank" href="<?php echo $video->getVideoUrl() ?>"><i class="icon-facetime-video"></i></a></td>
				<td><a target="_blank" href="<?php echo $video->getAttribute('image') ?>"><i class="icon-picture"></i></a></td>
				<td><?php echo $video->enabled ? 'Yes' : 'No' ;?></td>
				<td><a href="<?php echo '/admin/shows/'.$show_slug.'/videos/'.$video->youtube_url. '/edit' ?>"><i class="icon-pencil"></i></a></td>
				<td>
					<form method="POST" action="<?php echo '/admin/shows/'.$show_slug.'/videos/'.$video->youtube_url ?>" >
						<input type="hidden" name="_method" value="DELETE" />
						<button type="submit" class="btn-link delete"><i class="icon-remove"></i></button>
					</form>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>