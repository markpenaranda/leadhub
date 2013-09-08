<link rel="stylesheet" type="text/css" href="/assets/styles/bootstrap-wysihtml5-0.0.2.css" />
<script type="text/javascript" src="/assets/scripts/wysihtml5-0.4.0pre.js"></script>
<script type="text/javascript" src="/assets/scripts/bootstrap-wysihtml5-0.0.2.js"></script>

<style type="text/css">
	.content-wrapper { margin-top: 20px; }
	.content-wrapper .categories { margin-bottom: 5px; }
</style>
<div class="container-fluid content-wrapper">
	<div class="row-fluid">
		<form method="POST" class="form-horizontal span12" action="<?php echo str_replace('/edit', '', URL::current()); ?>" enctype="multipart/form-data">
			<div class="control-group">
				<label class="control-label" for="name">Name</label>
				<div class="controls">
					<input type="text" id="name" name="name" placeholder="Name" class="span3" value="<?php echo $show->name ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="image">Banner Image</label>
				<div class="controls">
					<input type="file" id="image" name="image" placeholder="Banner Image" class="span12" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="enabled">Enabled</label>
				<div class="controls">
					<select name="enabled" class="enabled" class="span3">
						<option value="1" <?php echo $show->enabled ? 'selected="true"' : null ?>>Yes</option>
						<option value="0" <?php echo !$show->enabled ? 'selected="true"' : null ?>>No</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="categories">Categories</label>
				<div class="controls">
					<select name="categories[]" class="categories" placeholder="Categories" class="span3">
						<option>NONE</option>
						<?php foreach($categories as $category) : ?>
						<option value="<?php echo $category->_id ?>"><?php echo $category->name?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="controls">
					<button type="button" class="btn btn-primary" id="add-category">add</button>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="description">Description</label>
				<div class="controls">
					<textarea id="description" rows="5" name="description" placeholder="Description" class="span5"><?php echo $show->description ?></textarea>
				</div>
			</div>
			
			<input type="hidden" name="_method" value="PUT" />
			<div class="control-group">
			    <div class="controls">
			      <button type="submit" class="btn btn-primary">Save</button>
			    </div>
		  	</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$(function () {
		var options = {
			"font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
			emphasis: true, //Italics, bold, etc. Default true
			lists: true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
			html: true, //Button which allows you to edit the generated HTML. Default false
			link: true, //Button to insert a link. Default true
			image: false, //Button to insert an image. Default true,
			color: false, //Button to change color of font
			stylesheets: false
		};

		$('#description').wysihtml5(options);

		var categories_el = $('select[class=categories]');

		$('#add-category').click(function (e) {
			e.preventDefault();
			categories_el.closest('.controls').append('<br />').append(categories_el.clone());
		});
	});
</script>