<?php

class TwitterController extends \BaseController {

	public function postTweet(){
		$status = Input::get('message');
		return Twitter::tweetStatus($status);
	   
  }
  public function getTweet(){
    return Twitter::tweetStatus('mark');
    
  }
}