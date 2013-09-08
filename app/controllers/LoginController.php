<?php
class LoginController extends BaseController{
	protected $layout = "front.layouts.default";

	public function getFacebook($redirect = "")
	{
		$auth = Facebook::auth($redirect);
		if(!Input::get('code') && !Session::get('fb_token'))
		{
			return Redirect::to($auth->getLoginUrl(Facebook::FACEBOOK_PERMISSIONS));
		}
		if(Input::get('code'))
		{
			$access = $auth->getAccess(Input::get('code'));
			Session::put('fb_token',$access['access_token']);
			$user_profile 	= Facebook::graph()->getUser();
			$user 			= new User;
			$user->provider = "facebook";
			$user->fb_token = $access['access_token'];
			$user->profile  = $user_profile;
			$user->username  = $user_profile['username'];

			if(isset($user_profile['email'])) 
			{
				$user->email 	= $user_profile["email"];
			}
			User::update(array('username'=>$user_profile['username']),$user->toArray(),array("upsert"=>true)); 
			Session::put('user', $user);
			if($redirect == "")
			{
					return Redirect::to(Session::get('redirect_uri', '/'));
			}
			else
			{
					$url = base64_decode($redirect);
					return Redirect::to($url);
			}
		}

		return Redirect::to(Session::get('redirect_uri', '/'));
	}

	public function getTwitter()
	{
		$auth	= Twitter::auth();
		if(!Session::has('twitter_access_token') && !Session::has('twitter_access_secret'))
		{
			if(!Session::has('twitter_request_secret')) 
			{
				$redirect_uri   =  URL::to('login/twitter');
				$token 		= $auth->getRequestToken(); 
				$login_url 	= $auth->getLoginUrl($token['oauth_token'], $redirect_uri);
				Session::put('twitter_request_secret', $token['oauth_token_secret']);
				return Redirect::to($login_url);
			}

				if(Input::get('oauth_token') && Input::get('oauth_verifier')){
					
					$token = $auth->getAccessToken(Input::get('oauth_token'), 
									Session::get('twitter_request_secret'), 
									Input::get('oauth_verifier'));

					Session::put('twitter_access_token',  $token['oauth_token']);
					Session::put('twitter_access_secret', $token['oauth_token_secret']);
					Session::remove('twitter_request_secret');
					
					$user = new User;
					$twitter_account = Twitter::getUserInfo();
					$twitter_id = $twitter_account['id'];
					$user->twitter_name = $twitter_account['name'];
					$user->twitter_account = $twitter_id;
					$user->twitter_screen_name = $twitter_account['screen_name'];
					
					User::update(array('twitter_account'=>$twitter_id),$user->toArray(),array("upsert"=>true)); 
					
					$leadhub_account = User::findOne(array('twitter_account' => $twitter_id));
				

					Session::put('leadhub_id', $leadhub_account->_id);
					



				
						//return '<script>window.close();</script>';
					
				}
			}
			
			return Redirect::to(Session::get('redirect_uri', '/'));	
		}

		public function getFoursquare(){
			$auth  = Foursquare::auth();

			if(!Input::get('code') && !Session::get('foursquare_token')){
				return Redirect::to($auth->getLoginUrl(Facebook::FACEBOOK_PERMISSIONS));
			}

			if(Input::get('code')){
				$access = $auth->getAccess(Input::get('code'));
				Session::put('foursquare_token', $access['access_token']);
				
			}
				return Redirect::to(Session::get('redirect_uri', '/'));
		}


		public function getChecktwitter(){

			if(Session::has('twitter_access_token')){
			return Response::json(array('authed' => true, 'access_token' => Session::get('twitter_access_token')));
			}
		return Response::json(array('authed' => false));
			
		}
		public function getFlush()
		{
			Session::remove('twitter_access_token');
			Session::remove('twitter_access_secret');
			Session::remove('twitter_request_secret');
			return '';
		}


		/*	POST ACTIONS
		----------------*/
		public function postIndex(){
			if(Session::token() != Input::get('_token')){
			return Redirect::to('login')->with('error','Session Token was expired!');
			}
			$user = User::findOne(array('email'=>e(Input::get('email'))));
			if($user == null){
				return Redirect::to('login')->with('error','No user was found.');
			}
			if(!Hash::check(Input::get('password'),$user->password)){
				return Redirect::to('login')->with('error','Password is incorrect.');
			}
			Session::put('user', $user);
			return Redirect::to('/');
		}

		public function postRegister(){
			if(Session::token() != Input::get('_token')){
			return Redirect::to('login?type=register')->with('register-error','Session Token was expired!');
			}

			//validations
			$input = Input::all();
			$rules = array(
					'first_name' 	=> 	'required',
					'last_name' 	=> 	'required',
					'email' 		=> 	'required',
					'password' 		=> 	'required',
					'password_again'=> 	'same:password'
				);
			$validation = Validator::make($input, $rules);
			if($validation->fails()){
				return Redirect::to('/login?type=register')->with('register-error','Please complete all fields to continue.');
			}

			$user = User::findOne(array(
					'email' 	=> 	e(Input::get('email'))
				));
			if($user != null){
				return Redirect::to('/login?type=register')->with('register-error','User email has been used already.');
			}
			if(Input::get('initial')){
				//todo 
			}else{
				$user = new User;
				$user->email 			= e(Input::get('email'));
				$user->password 		= e(Input::get('password'));
				$user->save();

				$user = User::findOne(array(
							'email' 	=> 	$user->email,
							'password' 	=> 	$user->password
						));

				$profile 				= new Profile;
				$profile->user_id 		= $user->id;
				$profile->first_name 	= e(Input::get('first_name'));
				$profile->last_name 	= e(Input::get('last_name'));

				if($profile->save()){
					Session::put('user',$user);
					return Redirect::to('/');
				}else{
					return Redirect::to('login?type=register')->with('register-error','An error has occured.');
				}


			}
		}

	}