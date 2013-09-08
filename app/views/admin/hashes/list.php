<div style="padding-top:40px;">
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
			<form action="<?=URL::current()?>" method="post">
				<div class="control-group">
					<label class="control-label" for="hash">Add Hash: </label>
				</div>
				<div class="controls">
					<input type="text" name="hash" class="input-xlarge" placeholder="Twitter Hash" />
					<button class="btn btn-primary" type="submit" style="margin-top:-10px;">Add</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span8 offset2">
			<table class="table-hover table-condensed">
				<thead>
					<tr>
						<th width="100%">Hashtag</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($hashes as $twit):?>
						<tr>
							<td><?=$twit->hash?></td>
							<td>
								<form action="<?=URL::to('admin/hashes/'.$twit->id)?>" method="post">
									<input type="hidden" name="_method" value="DELETE" />
									<div class="btn-group">
											<a class="btn btn-primary btn-mini" href="<?=URL::to('admin/hashes/'.$twit->id."/edit")?>"><i class="icon-edit"></i></a>
											<button class="btn btn-danger btn-mini" type="submit"><i class="icon-trash"></i></button>
									</div>
								</form>
							</td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>