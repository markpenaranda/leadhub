<style type="text/css">
	.login .wrapper { background: #fff; margin: 20px 0; padding: 20px; }
	.login .wrapper .social { 
		border: 1px dashed #ccc; 
		background: #f2f2f2; 
		display: block; 
		margin-bottom: 25px; 
		padding: 10px; 
	}
	.login .wrapper .social a { color: #fff; display: block; padding: 10px; text-align: center; }
	.login .wrapper .social .log-fb { background: #3e5e8f; }	
	.login .wrapper .social .log-twit { background: #42bee0; }
	.login .wrapper .social .log-google { background: #c93725; }

	.login .wrapper .user-login .form form .form-fields input { padding: 20px 10px; }
	.login .wrapper .sign-up .well form .form-fields .control-group .controls input { padding: 20px 10px; }
</style>

<div class="container">
	<div class="wrapper">
		<div class="row-fluid">
			<!-- login -->
			<div class="span6 user-login">
				<h3>Login</h3>
				<!-- fb & twitter -->
				<div class="social clearfix">					
					<!-- facebook -->
					<a class="span6 log-fb" href="/login/facebook">
						<i class="icon-facebook"></i> Facebook
					</a>
					<!--
					<a class="span6 log-google" href="/login/google">
						<i class="icon-google-plus"></i> Google Plus
					</a>
					-->
				</div>
				<!-- regular login -->
				<div class="form">
					<form method="post" action="/login">
						<?=Form::token()?>
						<!-- form input -->
						<div class="form-fields">
						<?php if(isset($posts['login'])) : ?>
							<?php //include(dirname(__FILE__).'/_message.php'); ?>
						<?php endif; ?>
						<?php if(Session::get('error')):?>
							<div class="alert alert-error">
								<?=Session::get('error')?>
							</div>
						<?php endif;?>
						<?php 
							echo View::make('front.blocks.text')->with(
									array(
										'name' 			=> 	'email',
										'placeholder'	=> 	'Your Email',
										'label'			=> 	'Email:',
										'value'			=>	'',
										'type' 			=> 	'text'
									)
								);
							echo View::make('front.blocks.text')->with(
									array(
										'name' 			=> 	'password',
										'placeholder'	=> 	'Your Password',
										'label'			=> 	'Password:',
										'value'			=>	'',
										'type' 			=> 	'password'
									)
								);
						?>							
						</div>
						<!-- form submit -->
						<div class="form-submit">
							<button type="submit" class="btn btn-info">
							<i class="icon-chevron-sign-right"></i> Login</button>
							<a href="/user/forgot"class="btn btn-link">Forgot Password?</a>
						</div>
					</form>
				</div>
			</div>
			<!-- sign up -->
			<div class="span6 sign-up">
				<h3>Sign up</h3>
				<!-- form well -->
				<div class="well">
					<?php if(Session::get('register-error')): ?>
						<div class="alert alert-error">
							<?=Session::get('register-error')?>
						</div>
					<?php endif;?>
					<form method="post" action="login/register">					
						<!-- form input -->
						<?=Form::token()?>
						<div class="form-fields">			
						<?php
							if(Input::get('type') == "register"):
								echo View::make('front.blocks.text')->with(
										array(
											'name' 			=> 	'first_name',
											'placeholder'	=> 	'First Name',
											'label'			=> 	'First Name: ',
											'value'			=>	'',
											'type' 			=> 	'text'
										)
									);
								echo View::make('front.blocks.text')->with(
										array(
											'name' 			=> 	'last_name',
											'placeholder'	=> 	'Last Name',
											'label'			=> 	'Last Name: ',
											'value'			=>	'',
											'type' 			=> 	'text'
										)
									);
								echo View::make('front.blocks.text')->with(
										array(
											'name' 			=> 	'email',
											'placeholder'	=> 	'Email',
											'label'			=> 	'Email: ',
											'value'			=>	'',
											'type' 			=> 	'text'
										)
									);
								echo View::make('front.blocks.text')->with(
										array(
											'name' 			=> 	'password',
											'placeholder'	=> 	'Password',
											'label'			=> 	'Password: ',
											'value'			=>	'',
											'type' 			=> 	'password'
										)
									);
								echo View::make('front.blocks.text')->with(
										array(
											'name' 			=> 	'password_again',
											'placeholder'	=> 	'Confirm Password',
											'label'			=> 	'Confirm Password: ',
											'value'			=>	'',
											'type' 			=> 	'password'
										)
									);
							else:
								echo View::make('front.blocks.text')->with(
										array(
											'name' 			=> 	'email',
											'placeholder'	=> 	'Your Email',
											'label'			=> 	'Sign up using your email: ',
											'value'			=>	'',
											'type' 			=> 	'email'
										)
									);
							endif;
						?>
						</div>
						<!-- form submit -->	
						<div class="form-submit">
						<?php if(Input::get('register') == "register") : ?>			
							<label>				
							By clicking Register, you confirm that you accepts our Terms of Use and Privacy Policy.
							</label>
						<?php endif; ?>
							<button class="btn btn-success btn-large">
							<i class="icon-check"></i> 
							<?php echo (Input::get('type') == 'register') ? 'Submit' : 'Sign up'; ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>