<style type="text/css">
	footer { background: #333; padding-bottom: 40px; padding-top: 40px; }
	footer .pinoy { color: #717171; font-size: 13px; margin-bottom: 10px; }
	footer .pinoy .social { margin-top: 25px; }
	footer .pinoy .social .border { 
		background: #717171; 
		border-radius: 50%; 
		color: #333; 
		display: inline-block; 
		font-size: 20px; 
		margin-right: 7px;
		padding: 7px 5px; 
		text-align: center; 
		width: 25px; }
	footer .pinoy .social .border:hover { 
		background: #fff; 
		border-radius: 50%; 
	}		
	footer .span3 .title { color: #30abe2; font-family: 'open_sansbold'; margin-bottom: 15px; }
	footer .span3 .signup { color: #fff; }	
	footer .span3 ul { display: block; margin-left: 0; }
	footer .span3 ul li { display: block; }
	footer .span3 ul li a { border-top: 1px #666 dotted; color: #fff; display: block; font-size: 13px; padding: 7px 0; }	
	footer .span3 ul li a:hover { color: #999; }

	footer .newsletter { color: #717171; font-size: 13px; }
	footer .newsletter #newsletter-alert { display: none; }
	footer .newsletter .input-append input { border-radius: 0; font-family: 'open_sansregular'; }
	footer .newsletter .input-append .btn { background: #30abe2; border-radius: 0; color: #fff; font-family: 'open_sansbold'; }
</style>

<footer>
	<div class="container">
		<div class="row-fluid">
			<!-- social -->
			<div class="span3 pinoy">
				<p class="title">PINOY REAL TV</p>
				<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. This is Photoshop's version  of Lorem Ipsum. </p>
				<div class="social">
					<a href="https://twitter.com/pinoyRealTV" target="_blank">
						<i class="border icon-twitter"></i>
					</a>					
					<a href="https://www.facebook.com/pages/Pinoy-Real-TV/117261415100305" target="_blank">
						<i class="border icon-facebook"></i>
					</a>					
				</div>
			</div>
			<!-- support -->
			<div class="span3 support">
				<p class="title">SUPPORT</p>
				<ul>
					<li><a href="#">About Pinoy RealTV</a></li>
					<li><a href="#">News</a></li>
					<li><a href="#">Career</a></li>
					<li><a href="#">Support</a></li>
				</ul>
			</div>
			<!-- about -->
			<div class="span3 about">
				<p class="title">ABOUT US</p>
				<ul>
					<li><a href="/about">About Pinoy RealTV</a></li>
					<li><a href="#">News</a></li>
					<li><a href="#">Career</a></li>
					<li><a href="#">Support</a></li>
				</ul>
			</div>
			<!-- newsletter & alert -->
			<div class="span3 newsletter">
				<p class="title signup">NEWSLETTER SIGNUP</p>
				<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.</p>
				<!-- alert -->
				<div id="newsletter-alert" class="alert"></div>
				<!-- newsletter -->
				<div class="input-append">					
					<input class="span8" name="newsletter_email" placeholder="Email" 
					id="appendedInputButton" type="text">
					<button class="btn" id="newsletter-btn" type="button">SEND</button>					
				</div>
			</div>
		</div>
	</div>
</footer>

<script type="text/javascript">
	(function($) {
		//saving newsletter email
		$('button#newsletter-btn').on('click', function() {
			var newsletterAlert = $('div#newsletter-alert');
			var email = $('input[name="newsletter_email"]').val();
			var data = { email : email ,'_token':'<?=Session::token()?>'};

			//ajax save email
			$.post('/newsletter', data, function(response) {
				newsletterAlert.css('display', 'block');
				newsletterAlert.attr('class', 'alert '+response.alert);
				newsletterAlert.html(response.message);
			}, 'json');
		});

		$('input[name="newsletter_email"]').on('keyup', function(e) {
			//enter code
			if(e.keyCode == 13) {
				$('button#newsletter-btn').trigger('click');
			}
		});

	})(jQuery);
</script>