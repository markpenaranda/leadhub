<style type="text/css">
	.videos .delete { padding: 0; line-height: initial; }
	.videos form { margin-bottom: 0; }
	.list-video { margin-top: 20px; }
</style>

<div class="container list-video">
	<h2>Videos</h2>
	<table class="table table-bordered table-hover videos">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Youtube URL</th>
				<th>Image</th>
				<th>Add to Playlist</th>
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
				<td>
					<form method="POST" action="<?php echo '/admin/playlist' ?>" >
						<input type="hidden" name="youtube_url" value="<?php echo $video->youtube_url ?>" />
						<input type="hidden" name="_method" value="POST" />
						<button type="submit" class="btn-link"><i class="icon-plus"></i></button>
					</form>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>