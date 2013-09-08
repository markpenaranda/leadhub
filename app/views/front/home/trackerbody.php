<style type="text/css">
	.sidebar .sidebar-container {
		padding: 8px;
		margin-top: 23px;
	}
	.page-content {
		margin-top : 20px;
	}

</style>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add New Project</h3>
  </div>
  <div class="modal-body">
<!--   <div class="alert alert-success alert-block">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <h4>Success!</h4>
			<p>Project Saved</p>
	</div> -->
    <p><input type="text" id="project-title" placeholder="Type Project Title"></p>
    <p><textarea type="text" id="project-description" placeholder="Type Project Description"></textarea></p>
  
  </div>
  <div class="modal-footer">
    <a href="#" class="btn">Close</a>
    <a href="#" id="save-project" class="btn btn-primary">Save changes</a>
  </div>
</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<div class="sidebar-container">
				<center><img src="<?php echo $twitter['profile_image_url']; ?>" /></center>
				<h4><?php echo $twitter['name']; ?></h4>
				<a href="#" data-toggle="tooltip" data-placement= "right" data-animation="true" title="Customize Your Details" >Edit Profile</a>
				<hr>
			<div class="sidebar-nav">
				<div class="well" style=" padding: 8px 0;">
					<ul class="nav nav-list"> 
						<li class="nav-header">Tools</li>        
						<li class="active"><a href="index"><i class="icon-home"></i> Dashboard</a></li>
						<li><a href="#"><i class="icon-calendar"></i> Calendar</a></li>
						<li><a href="#"><i class="icon-comment"></i> Comments</a></li>
						<li><a href="#"><i class="icon-picture"></i> Gallery</a></li>
					</ul>
				</div>
			</div>
	</div>		


			</div>

			<div class="main-content">

				<div class="page-content">
					

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<a href="#" id="add-new-project" class="btn btn-primary btn-medium pull-right" data-toggle="tooltip" data-placement= "left" data-animation="true" title="Add Your Projects to Get Started">Add Project</a>
							<div style="margin-top:20px;"class="tabbable"> <!-- Only required for left/right tabs -->
							  <ul class="nav nav-tabs">
							    <li class="active"><a href="#project-container" data-toggle="tab">All Projects</a></li>
							 
							  </ul>
							  <div class="tab-content">
							    <div class="tab-pane active" id="project-container">
								   <?php echo View::make('front/block/item')->with($data); ?>

							    </div>
							    <div class="tab-pane" id="planning-container">
							      	<ul class="thumbnails">
										<li class="span12 clearfix">
										  	<div class="thumbnail clearfix">
										    	<img src="http://placehold.it/320x200" alt="ALT NAME" class="pull-left span3 clearfix" style='margin-right:10px'>
										    	<div class="caption" class="pull-left">
										    		<a href="http://bootsnipp.com/" class="btn btn-primary icon  pull-right">Start</a>
										    		<a href="http://bootsnipp.com/" class="btn btn-primary icon"  style="float: right; margin-right: 20px;">Tweet</a>
										    		<h4>      
										      			<a href="#" >20-storey Building for a XYZ National High School</a>
										      		</h4>
										     		<small><b>Description: </b>50 million pesos budget ... blah blah blah... blah blah blah...</small>
										    	</div>
										  	</div>
										</li>
									</ul>
							    </div>
							    <div class="tab-pane" id="start-container">
							    	<ul class="thumbnails">
										<li class="span12 clearfix">
										  	<div class="thumbnail clearfix">
										    	<img src="http://placehold.it/320x200" alt="ALT NAME" class="pull-left span3 clearfix" style='margin-right:10px'>
										    	<div class="caption" class="pull-left">
										    		<a href="http://bootsnipp.com/" class="btn btn-primary icon  pull-right">Process</a>
										    		<a href="http://bootsnipp.com/" class="btn btn-primary icon"  style="float: right; margin-right: 20px;">Tweet</a>
										    		<h4>      
										      			<a href="#" >20-storey Building for a XYZ National High School</a>
										      		</h4>
										     		<small><b>Description: </b>50 million pesos budget ... blah blah blah... blah blah blah...</small>
										    	</div>
										  	</div>
										</li>
									</ul>
							    </div>
							    <div class="tab-pane" id="onprocess-container">
							      	<ul class="thumbnails">
										<li class="span12 clearfix">
										  	<div class="thumbnail clearfix">
										    	<img src="http://placehold.it/320x200" alt="ALT NAME" class="pull-left span3 clearfix" style='margin-right:10px'>
										    	<div class="caption" class="pull-left">
										    		<a href="http://bootsnipp.com/" class="btn btn-primary icon  pull-right">Done</a>
										    		<a href="http://bootsnipp.com/" class="btn btn-primary icon"  style="float: right; margin-right: 20px;">Tweet</a>
										    		<h4>      
										      			<a href="#" >20-storey Building for a XYZ National High School</a>
										      		</h4>
										     		<small><b>Description: </b>50 million pesos budget ... blah blah blah... blah blah blah...</small>
										    	</div>
										  	</div>
										</li>
									</ul>
							    </div>
							    <div class="tab-pane" id="done-container">
							      <p>Howdy, I'm in Section 2.</p>
							    </div>
							    <div class="tab-pane" id="cancelled-container">
							      <p>Howdy, I'm in Section 2.</p>
							    </div>
							  </div>
							</div>
							
							
						</div><!--/.span-->
					</div><!--/.row-fluid-->

					

				</div><!--/.page-content-->

				
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>



		<script type="text/javascript">
			jQuery(function($) {

				$('a').tooltip('show')

				$("#add-new-project").on('click', function(){
					$('#myModal').modal('show');
				});



				$('#save-project').on('click', function(){
					var project_title = $('#project-title').val();
					var project_description = $('#project-description').val();
						$.post('/project/saveproject',{title : project_title, description : project_description}, function(data){
				          $('#project-container').html(data);
				        });
				          
					$('#myModal').modal('hide');
				});



  		$(".change-status").on('click' , function(){
  		
    	var data = {
     	 id : $(this).attr('data-id'),
      	status : $(this).attr('data-value') 

    	}
    
    	$.post('/project/status', data, function(data){
    			console.log(data);

    			  $('#project-container').html(data);
    	});
    });
			
			
			})
		</script>
