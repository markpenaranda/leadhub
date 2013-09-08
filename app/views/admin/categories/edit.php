<link rel="stylesheet" type="text/css" href="/assets/styles/bootstrap-wysihtml5-0.0.2.css" />
<script type="text/javascript" src="/assets/scripts/wysihtml5-0.4.0pre.js"></script>
<script type="text/javascript" src="/assets/scripts/bootstrap-wysihtml5-0.0.2.js"></script>

<style type="text/css">
	.content-wrapper { margin-top: 20px; }
</style>
<div class="container-fluid content-wrapper">
	<div class="row-fluid">
		<form method="POST" class="form-horizontal span12" action="/admin/categories/<?php echo $current_category->slug ?>">
			<div class="control-group">
				<label class="control-label" for="name">Name</label>
				<div class="controls">
					<input type="text" id="name" name="name" placeholder="Name" class="span3" value="<?php echo $current_category->name ?>" required="true" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="parent">Parent</label>
				<div class="controls">
					<select name="parent" id="parent" placeholder="Parent" class="span3">
						<option>NONE</option>
						<?php foreach($categories as $category) : ?>
						<option value="<?php echo $category->_id ?>" <?php echo ($current_category->parent) && ((string)$current_category->parent == $category->_id) ? 'selected="true"' : null; ?>><?php echo $category->name?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<input type="hidden" name="_method" value="PUT" />
			<div class="controls">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		  	</div>
		</form>
	</div>
</div>