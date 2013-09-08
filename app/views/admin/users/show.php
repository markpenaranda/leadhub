<div style="padding:10px;">
	<div class="row-fluid">
		<div class="span4 offset4">
			<?php if(Session::get('error')): ?>
				<div class="alert alert-error">
					<?=Session::get('error')?>
				</div>
			<?php endif; ?>
			<?php if(Session::get('success')):?>
				<div class="alert alert-success">
					<?=Session::get('success')?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6">
			<h3>User Info</h3>
			<form action="/admin/users/<?=$user->id?>" method="POST">
				<?=Form::token()?>
				<div class="control-group">
					<label class="control-label" for="username">Username: </label>
					<div class="controls">
						<input type="text" name="username" class="input-xlarge" value="<?=$user->username?>" disabled="disabled"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password">Password: </label>
					<div class="controls">
						<input type="password" name="password" class="input-xlarge" value=""/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="new_password">New Password: </label>
					<div class="controls">
						<input type="password" name="new_password" class="input-xlarge" value=""/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="repeat_password">Repeat Password: </label>
					<div class="controls">
						<input type="password" name="repeat_password" class="input-xlarge" value=""/>
					</div>
				</div>
				<input type="hidden" name="_method" value="PUT" />
				<button class="btn btn-primary" type="submit">Save</button>
			</form>
		</div>
		
	</div>
	
	

</div>