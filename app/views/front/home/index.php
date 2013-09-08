<style type="text/css">
	/* defaullt */
	/* defaullt */
	.home .wrapper { background: #fff; margin: 0px 0 20px; padding: 20px; }
	.home .carousel { margin-bottom:  0; margin-top: 20px; }
	.home .wrapper .shows-mid .show-border { background: #f2f2f2; padding: 15px; }
	.home .wrapper .shows-mid .show-border .show-item {margin: 5px;}
	.home .wrapper .shows-mid .show-border .show-item img { margin-bottom: 15px; width: 100%; }
	.home .wrapper .shows-mid .show-border .show-item .show-title { font-family: 'open_sansbold'; }

	.home .wrapper .shows-watching { margin-top: 20px; }
	.home .wrapper .shows-watching .shows .show-border { background: #f2f2f2; padding: 15px; }
	.home .wrapper .shows-watching .shows .show-border .show-item { 
		display: block; 
		float: left; 
		margin-bottom: 10px;
		margin-left: 7px; 
		width: 290px; }
	.home .wrapper .shows-watching .shows .show-border .show-item  img{height:163px;}
	.home .wrapper .shows-watching .shows .show-border .show-item .show-title { font-family: 'open_sansbold'; margin-top: 10px; }

	
</style>


<div class="container">
	<?php echo View::make('front/blocks/carousel'); ?>
	<div class="wrapper">
		<?php echo View::make('front/blocks/latest_episodes')->with('latest_episodes', $latest_episodes)?>
		<!-- shows & watching -->
		<div class="row-fluid shows-watching">
			<!-- shows -->
			<div class="span8 shows">
				<div class="show-border clearfix">
								
					<div class="row-fluid show-rows">
						<?php echo View::make('front/blocks/title_cards')->with(array('shows'=>$shows,'classes'=>'span6'))?>
					</div>
												
				</div>
			</div>
			<?php echo View::make('front/blocks/chat') ?>
		</div>	
	</div>
</div>
<!-- Modal -->
<div id="advisory" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="advisory-label" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="advisory-label alert alert-info" style="color: #3a87ad;">Advisory!</h3>
	</div>
	<div class="modal-body">
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
		<button id="accept-reload" class="btn btn-primary">Yes</button>
	</div>
</div>
<script type="text/javascript" src="/assets/scripts/jwplayer.js"></script>