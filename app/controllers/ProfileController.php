<?php

class ProfileController extends \BaseController {
	protected $layout = "front.layouts.default";

	public function getIndex(){
		if(!Session::has('twitter_access_token')){
			$this->layout->title = "Welcome to LeadHub";
			$this->layout->class="";
			$this->layout->head = View::make('front/landing/head');
			$this->layout->body=View::make('front/landing/body');;
			$this->layout->foot = View::make('front/landing/foot');;

		}
		else{
			$user = Twitter::getUserInfo();
		// dd($user);
		$projectList = Project::getAllProjects();
		$data = array('data' => array('items' => $projectList),
									'twitter' => $user
			);

		$this->layout->title = "LeadHub";
		$this->layout->class = "";
		$this->layout->meta = "";
		$this->layout->name = "";
		$this->layout->content = "";
		$this->layout->head = View::make("front.home.trackerhead");
		$this->layout->body = View::make("front.home.trackerbody2")->with($data);
		$this->layout->foot = "";
		}
	}
}