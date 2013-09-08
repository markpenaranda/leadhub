<div class="row-fluid">
	<div class="span8 offset2 well">
		<h3>Twitter Hashes</h3>
		<div class="row-fluid">
			<div class="span4">
				<?php if(Session::get('error')):?>
				<div class="alert alert-error">
					<?=Session::get('error')?>
				</div>
				<?php endif;?>
				<?php if(Session::get('success')):?>
				<div class="alert alert-info">
					<?=Session::get('success')?>
				</div>
				<?php endif;?>
			</div>
		</div>
		<form action="<?=URL::to('admin/hashes/'.$hash->id)?>" method="post">
			<input type="hidden" name="_method" value="PUT" />
			<div class="control-group">
				<label class="control-label" for="hash">Hash: </label>
			</div>
			<div class="controls">
				<input type="text" name="hash" class="input-xlarge" placeholder="Twitter Hash" value="<?=$hash->hash?>"/>
				<button class="btn btn-primary" type="submit" style="margin-top:-10px;">Save</button>
			</div>
		</form>
	</div>
</div>