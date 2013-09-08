<link rel="stylesheet" type="text/css" href="/assets/styles/bootstrap-wysihtml5-0.0.2.css" />
<script type="text/javascript" src="/assets/scripts/wysihtml5-0.4.0pre.js"></script>
<script type="text/javascript" src="/assets/scripts/bootstrap-wysihtml5-0.0.2.js"></script>

<link rel="stylesheet" type="text/css" href="/assets/styles/jquery.timepicker.css" />
<script type="text/javascript" src="/assets/scripts/jquery.timepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/scripts/lib/base.css" />
<script type="text/javascript" src="/assets/scripts/lib/base.js"></script>
<script type="text/javascript" src="/assets/scripts/lib/datepair.js"></script>


<style type="text/css">
	.create-video { margin-top: 20px; }
	.container-fluid .credited-action { margin-bottom: 5px; }
</style>
<div class="container-fluid create-video">
	<div class="row-fluid">
		<form method="POST" class="form-horizontal span12" action="/admin/shows/<?php echo $show_slug ?>/videos" enctype="multipart/form-data">
			<div class="control-group">
				<label class="control-label" for="title">Title</label>
				<div class="controls">
					<input type="text" id="title" name="title" placeholder="Title" class="span3" value="<?php echo Input::old('title'); ?>" required="true" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="youtube_url">Youtube URL</label>
				<div class="controls">
					<input type="text" id="youtube_url" name="youtube_url" placeholder="Youtube URL" class="span3" value="<?php echo Input::old('youtube_url'); ?>" required="true" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="schedule">Schedule</label>
				<div id="scheduler" class="controls">
						
				</div>
				<div class="controls">
					<p class="datepair" data-language="javascript">
						<input type="text" id="date-pick" class="date start" />
						<input type="text" id="time-pick" class="time start ui-timepicker-input" autocomplete="off" />
			  		<input type="text" style="display:none;" class="hidden time end ui-timepicker-input" autocomplete="off">
						<input type="text" style="display:none;" class="hidden date end">
			  		<a href="#" id="addSchedule" class="btn">+Add Schedule</a>
			  	</p>
			  </div>
			</div>
			<div class="control-group">
				<label class="control-label" for="like">Like</label>
				<div class="controls">
					<input type="text" name="like" placeholder="Page Id" class="span3" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="share">Share</label>
				<div class="controls">
					<input type="checkbox" name="share" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="description">Description</label>
				<div class="controls">
					<textarea id="description" rows="5" name="description" placeholder="Description" class="span5"><?php echo Input::old('description')?></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="tags">Tags</label>
				<div class="controls">
					<textarea rows="5" name="tags" placeholder="Tags" class="span5"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="image">Thumbnail</label>
				<div class="controls">
					<div class="fileupload fileupload-new" data-provides="fileupload">
					  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
					  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
					  <div>
					    <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image" /></span>
					    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
					  </div>
					</div>
				</div>
			</div>
			
			<div class="control-group">
			    <div class="controls">
			      <button type="submit" class="btn btn-primary">Create</button>
			    </div>
		  	</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$(function () {
		var wysightml5_options = {
			"font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
			emphasis: true, //Italics, bold, etc. Default true
			lists: true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
			html: true, //Button which allows you to edit the generated HTML. Default false
			link: true, //Button to insert a link. Default true
			image: false, //Button to insert an image. Default true,
			color: false, //Button to change color of font
			stylesheets: false
		};

		$('#description').wysihtml5(wysightml5_options);

		var date_pair = $('.datepair')[0];
		var scheduler = $('#scheduler');

		$('#addSchedule').on('click', function() {

				var datePick = $('#date-pick').val();
				var timePick = $('#time-pick').val();
				if(datePick != "" && timePick != ""){
				$('#scheduler').append('<div class="date-val"><input type="text" readonly name="date-start[]" value="'+datePick+'"><input type="text" readonly  name="time-start[]" value="'+timePick+'"><a href="#" class="btn-link remove-schedule"><i class="icon-remove"></i></a></div>')
				}
		});
		
		$("#scheduler").on('click', '.remove-schedule', function(){
		      $(this).closest('.date-val').fadeOut().remove();
		});

	});
</script>
