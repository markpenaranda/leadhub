<div style="padding:10px;">
	<h3>Users</h3>
	<div class="row-fluid">
		<div class="span4 offset4">
			<div class="alert alert-info">
				Profiles will only be created upon save on the database.
			</div>
			<?php if(Session::get('success') != null): ?>
				<div class="alert alert-success">
					<?=Session::get('success') ?>
				</div>
			<?php endif; ?>
			<?php if(Session::get('error') != null): ?>
				<div class="alert alert-error">
					<?=Session::get('error') ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<form action="/admin/users" method="post">
		<div class="control-group">
			<label class="control-label" for="username">Username: </label>
			<div class="controls">
				<input type="text" name="username" class="input-xlarge" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password">Password: </label>
			<div class="controls">
				<input type="password" name="password" class="input-xlarge" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="repeat_password">Repeat Password: </label>
			<div class="controls">
				<input type="password" name="repeat_assword" class="input-xlarge" />
			</div>
		</div>
		<button class="btn btn-primary ">Save</button>
	</form>
</div>