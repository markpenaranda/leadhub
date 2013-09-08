<!-- include the fb channel file -->
<div id="fb-root"></div>
<script type="text/javascript">
  	window.fbAsyncInit = function() {
		// init the FB JS SDK
		FB.init({
			appId      : "<?php echo Facebook::FACEBOOK_KEY ?>",    // App ID from the app dashboard
			channelUrl : "<?php echo URL::to('channel.html') ?>",   // Channel file for x-domain comms
			status     : false,                                      // Check Facebook Login status
			xfbml      : true,                                      // Look for social plugins on the page
			cookie     : true
		});

		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
				//user is logged in and has accepted you apps stuff.

				var UID = response.authResponse.userID;
				var TOKEN = response.authResponse.accessToken;
			}
		});

		// FB.api("/me/likes/<?php echo $action->page->id ?>", {limit: 1}, function(r) { 
		// 	if (r.data.length == 1) {
		// 		//send the ajax that the user has performed the credited action
		// 	    	var data = {
		// 	    		"_method": "PUT",
		// 	    		"type": "like",
		// 	    		"actionId": "<?php echo $action->_id ?>"
		// 	    	};

		// 	    	$.post(null, data, function(response) {
		// 	    		if(response.hasOwnProperty('success') && response.success) {
		// 	    			$("#credit-modal").modal("hide");
		// 	    			credited = true;
		// 	    		}
		// 	    	});
		// 	}
		// });

		FB.Event.subscribe('edge.create', function(response) {
		    	console.log('thanks for liking the page!');
		    	
		    	//send the ajax that the user has performed the credited action
		    	var data = {
		    		"_method": "PUT",
		    		"type": "like",
		    		"actionId": "<?php echo $action->_id ?>"
		    	};

		    	$.post(null, data, function(response) {
		    		if(response.hasOwnProperty('success') && response.success) {
		    			$("#credit-modal").modal("hide");
		    			credited = true;
		    		}
		    	});
		});
	};

	// Load the SDK asynchronously
	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

<div id="credit-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="credit-modal" aria-hidden="true">
	<div class="modal-body">
		<h5>Before you can play this video, please like the page first.</h5>
		<p>
			<!-- <img src="https://graph.facebook.com/<?php echo $action->page->id ?>/picture" alt="image" class="pull-left"/>
			<h5 style="margin-left: 10px; display:inline"><?php echo $action->page->name ?></h5>
			<br/>
			<span style="margin-left: 10px"><?php echo $action->page->about ?></span> -->
			<!-- <iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($action->page->link) ?>&amp;width=292&amp;height=62&amp;colorscheme=light&amp;show_faces=false&amp;header=false&amp;stream=false&amp;show_border=true&amp;appId=<?php echo Facebook::FACEBOOK_KEY ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:62px;" allowTransparency="true"></iframe> -->
			<fb:like-box href="<?php echo $action->page->link ?>" width="292" show_faces="false" header="false" stream="false" show_border="false"></fb:like-box>
		</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>