<style type="text/css">
	.watching .watching-box { border: 2px #30abe2 solid; }
	.watching .watching-box .caption { 
		background: #30abe2; 
		color: #fff; 
		display: block;
		font-family: 'open_sansbold'; 
		padding: 7px; 
		text-align: center; 
	}

	.watching .watching-box .content { padding: 15px; text-align: center; }
	.watching .watching-box .content .people { 
		background: #333; 
		display: block; 
		float: left;
		margin-bottom: 3px;
		margin-left: 3px; 
		width: 50px;
		height: 50px;
	}
	.watching .chat-box { border: 1px solid #e2e1e1; }
	.watching .chat-box .chat-menu { display: block; }
	.watching .chat-box .chat-menu ul { display: block; margin: 0; }
	.watching .chat-box .chat-menu ul li { background: #333; display: inline-block; float: left; list-style-type: none; text-align: center; width: 50%; }
	.watching .chat-box .chat-menu ul li.active { background: #30abe2; } 
	.watching .chat-box .chat-menu ul li a { color: #fff; display: inline-block; font-family: 'open_sansbold'; padding: 15px 20px; }
	.watching .chat-box .social-content { display: none; height: 320px; padding: 5px; overflow-y: auto; overflow-x: hidden; }
	.watching .chat-box .social-content .tweets { margin-bottom: 5px; }
	.watching .chat-box .social-content .connect  { display: block; text-align: center;  }
	.watching .chat-box .social-content .connect .connect-twitter { 
		background: #42bee0; 
		color: #fff;
		display: inline-block;
		margin-top: 20px;
		padding: 10px 25px; 
		text-align: center; 
	}

	.watching .chat-box .social-content .connect .connect-twitter:hover { 
		background: #33abcc; 
		color: #fff; 
		display: inline-block;
		margin-top: 20px;
		padding: 10px 25px; 
		text-align: center; 
	}	

	.watching .chat-box .chat-input { background: #e2e1e1; display: block; padding: 10px; }
	.watching .chat-box .chat-input textarea { resize: none; }
	.watching .chat-box .chat-input .send-btn { 
		background: #999; 
		color: #fff; 
		margin-top: 4px; 
		padding: 5px 15px; 
	}

	.watching .chat-box .chat-loader { height: 100%; background-color: #F8F8F8; }
	.watching .chat-box .chat-content { height: 320px; overflow-y: auto; overflow-x: hidden; border: 1px solid transparent; padding: 5px; }.
	.watching .chat-box .chat-content .message { margin-bottom: 5px; }
	.watching .chat-box .chat-content .message .time { color: gray; font-size: 9px; font-family: 'lucida grande',tahoma,verdana,arial,sans-serif; }
	.watching .chat-box .chat-content .message p { font-size: 13px; margin-bottom: 0; line-height: 17px; word-wrap: break-word;}
	.watching .chat-box .chat-input .input-container { background-color: #FFF; margin-bottom: 10px; padding: 10px; padding: 4px 6px 4px 6px; }
	.watching .chat-box .chat-input .input-container textarea {
		margin-bottom: 0;
		padding: 0;
		border-style:solid;
		border: none; 
		border-radius: 0
		-moz-border-radius: 0;
		-webkit-border-radius: 0;
	    	box-shadow: none;
		-moz-box-shadow: none;
	    	-webkit-box-shadow: none;
	}

	.watching .chat-box .chat-input .input-container textarea:focus {
		outline:none;
		border: none;
	}

	.watching .chat-box .chat-input .smiley { color: #999999; }
	.watching .chat-box .chat-input .tooltip-inner { background-color: #CCC; }
	.watching .chat-box .chat-input .tooltip-inner .emoticon { cursor: pointer;}
	.watching .chat-box .chat-input .tooltip-arrow { border-top-color: #CCC !important; }

	.watching .chat-box .connect-twitter { 
		background: #42bee0; 
		color: #fff; 
		display: inline-block;
		margin-top: 20px;
		padding: 10px 25px; 
		text-align: center; 
	}

	.watching .chat-box .connect-twitter:hover { 
		background: #33abcc; 
		color: #fff; 
		display: inline-block;
		margin-top: 20px;
		padding: 10px 25px; 
		text-align: center; 
	}	
	.watching .chat-box .twitter-input { display: none;}

	.watching .chat-box .chat-input .twitter-checkbox {
		display:none;
	}

	.watching .watching-box { border: 2px #30abe2 solid; margin-top: 20px; }
	.watching .watching-box .caption { 
		background: #30abe2; 
		color: #fff; 
		display: block;
		font-family: 'open_sansbold'; 
		padding: 7px; 
		text-align: center; 
	}

	.watching .watching-box .content { padding: 15px; text-align: center; }
	.watching .watching-box .content .people { 
		background: #333; 
		display: block; 
		float: left;
		margin-bottom: 3px;
		margin-left: 3px; 
		width: 50px;
		height: 50px;
	}
</style>
<!-- chat -->
<div class="span4 watching">
	<!-- chat box -->
	<div class="chat-box">
		<!-- chat menu -->
		<div class="chat-menu">
			<ul>
				<li class="active"><a href="#">Live Chat</a></li>
				<li><a href="#">Social Feeds</a></li>
			</ul>
		</div>
		<!-- chat content -->
		<div class="chat-content">
			<div class="chat-loader">
				<img src="/assets/images/loading.gif" alt="" />
			</div>
		</div>
		<!-- social content -->
		<div class="social-content">
		<!-- tweets -->	 
			<div class="row-fluid tweets">
			<?php if(isset($tweets)) : ?>
				<?php foreach($tweets as $tweet) : ?>
					<div class="row-fluid" style="padding:5px 0;">
						<div class="span3">
							<img src="<?php echo $tweet['user']['profile_image_url']; ?>" 
							title="<?php echo $tweet['user']['name']; ?>" />
						</div>
						<div class="span8">
							<p><?php echo str_replace('#PinoyRealTV', '<span class="blue">#PinoyRealTV</span>', $tweet['text']); ?></p>
						</div>
					</div>
				<?php endforeach; ?>	
			<?php else : ?>					
				<div class="connect">
					<!-- <div class="control-group" style="text-align: left; padding: 20px 20px 0; margin-bottom: 0;">
						<label class="control-label" for="username">Username:</label>
						<div class="controls">
							<input type="text" id="username" name="username" placeholder="Username" style="width: 100%;" />
						</div>
					</div>
					<div class="control-group" style="text-align: left; padding: 0px 20px; margin-bottom: 0;">
						<label class="control-label" for="password">Password:</label>
						<div class="controls">
							<input type="text" id="password" name="password" placeholder="Password" style="width: 100%;" />
						</div>
					</div> -->

				</div>
			<?php endif; ?>
			</div>
		</div>
		<!-- chat input-->
		<div class="chat-input clearfix">
			<div class="chat-textbox">
				<div class="input-container">
					<textarea class="input-block-level" placeholder="Write a reply..." maxlength="300"></textarea>
					<a href="#" class="smiley pull-right"><i class="icon-smile"></i></a>
					<div style="clear: both;"></div>
				</div>
				<span class="fb-checkbox"><input type="checkbox" id="post-to-facebook">Post this on your wall.</span>
				<span class="twitter-checkbox"><input type="checkbox" id="post-to-facebook">Tweet this.</span>
				<a href="#" class="send-btn pull-right">Send</a>		
			</div>	
			<?php if (Session::has('twitter_access_token')) : ?>
			<div class="twitter-input clearfix twitter-textbox">
				<div class="input-container">
					<textarea class="tweet-block-level" placeholder="Write a reply and Tweet..." maxlength="300"></textarea>
					<div style="clear: both;"></div>
				</div>
				<a href="#" class="send-btn tweet-btn pull-right"><i class="icon-twitter"></i> Tweet</a>					
			</div>
			<?php else : ?>

			<div class="twitter-input clearfix">
				<div style="display:none;" class="clearfix twitter-textbox">
					<div class="input-container">
						<textarea class="tweet-block-level" placeholder="Write a reply and Tweet..." maxlength="300"></textarea>
						<div style="clear: both;"></div>
					</div>
					<a href="#" class="send-btn tweet-btn pull-right"><i class="icon-twitter"></i> Tweet</a>					
				</div>
				<div class='twitter-connector'>
				<center><a href="/login/twitter" class="connect-twitter"><i class="icon-twitter"></i> Connect to Twitter</a></center>
				</div>
			</div>
		<?php endif; ?>
		</div>
		<!-- Twitter Chat -->

	</div>
	<div class="watching-box">
		<div class="caption">WHO'S WATCHING</div>
		<div class="content clearfix">
			<!-- people -->
		</div>
	</div>
</div>

<script type="text/javascript">
	<?php $userData = array(); ?>
	<?php $userData['room'] = isset($video_url) ? base64_encode($video_url) : base64_encode('play'); ?>
	<?php if(Session::get('user')): ?>
		<?php $profile 	= Session::get('user')->profile; ?>
		<?php $userData['user_first'] 	= $profile['first_name']; ?>
		<?php $userData['user_last'] 	= $profile['last_name']; ?>
		<?php $userData['user_facebook'] = $profile['id']; ?>
		var userFb   = <?php echo '"' . $profile['id'] . '";'; ?>
	<?php endif;?>
	var userData = <?php echo '"' . base64_encode(json_encode($userData)) . '";'; ?>	
</script>
<script type="text/javascript" src="http://106.186.25.188:8888/socket.io/socket.io.js"></script>
<script type="text/javascript" src="/assets/scripts/emoticons.js"></script>
<link rel="stylesheet" href="/assets/styles/emoticons.css">
<script type="text/javascript" src="/assets/scripts/moment.min.js"></script>
<script type="text/javascript" src="/assets/scripts/chat.js"></script>
<script type="text/javascript">
	var TwitterConnect = (function()
	{
		// constructor accepts a url which should be your Twitter OAuth url
		function TwitterConnect(url) {
			this.url = url;
		}

		TwitterConnect.prototype.exec = function() {
			var self = this,
			params = 'location=0,status=0,width=800,height=600';

			this.twitter_window = window.open(this.url, 'twitterWindow', params);

			this.interval = window.setInterval((function() {
				if (self.twitter_window.closed) {
					window.clearInterval(self.interval);
					self.finish();
				}
			}), 1000);
		}

		TwitterConnect.prototype.finish = function() {

			console.log('check the server if the user really logged in');
			$.ajax({
				type: 'get',
				url: '/login/checktwitter',
				dataType: 'json',
				success: function(response) {
					if (response.authed) {
							console.log(response);
						// the user authed on Twitter, so do something here
							$('div.twitter-connector').css('display', 'none');
							$('div.twitter-textbox').css('display', 'block');	
					} else {
						// the user probably just closed the window
						console.log('the user probably just closed the window');
					}
				}
			});
		};

		return TwitterConnect;
	})();
</script>
<script type="text/javascript">
	var onSocial = 0;
	$(function () {
		$('div.chat-menu ul li a').on('click', function(e) {
			e.preventDefault();
			var i = $(this).parent('li').index() + 1;
			var div = $('div.chat-menu ul li');
			var divActive = $('div.chat-menu ul li:nth-child('+i+')');
			div.removeClass('active');
			divActive.addClass('active');
				$('div.chat-textbox').css('display', 'block');
				$('div.twitter-input').css('display', 'none');
			if(i == 1) {
				$('div.chat-content').css('display', 'block');
				$('div.social-content').css('display', 'none');
				onSocial = 0;
				$('div.chat-textbox').css('display', 'block');
				$('div.twitter-input').css('display', 'none');
			} else {
				onSocial = 1;
				$('div.chat-content').css('display', 'none');
				$('div.social-content').css('display', 'block');
				$('div.chat-textbox').css('display', 'none');
				$('div.twitter-input').css('display', 'block');				
			}
		});

		var connect_twitter_btn = $('.connect-twitter');
		var twitter_connect = new TwitterConnect(connect_twitter_btn.attr('href') + '?popup=1');

		connect_twitter_btn.click(function(e) {
			e.preventDefault();
			twitter_connect.exec();
		});

		$('#accept-reload').click(function () {
			window.top.location.href = 'http://pinoyreal.tv';
		});
	});
</script>