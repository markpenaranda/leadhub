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

		// FB.getLoginStatus(function(response) {
		// 	if (response.status === 'connected') {
		// 		//user is logged in and has accepted you apps stuff.

		// 		var UID = response.authResponse.userID;
		// 		var TOKEN = response.authResponse.accessToken;
		// 	}
		// });
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