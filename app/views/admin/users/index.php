<div class="row-fluid">
	<div class="span12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Username</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php $users->each(function($user){ ?>
				<tr>
					<td><?=$user->id?></td>
					<td><?=$user->username?></td>
					<td><a href="/admin/users/<?=$user->id?>">Profile</a></td>
				</tr>
				<?php });?>
			</tbody>
		</table>
	</div>
</div>