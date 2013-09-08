<?php

class LandingController extends \BaseController {
	protected $layout = "front.layouts.default";
	
	public function getIndex(){
		$this->layout->title = "TWIDDLER DAW";
		$this->layout->class = "";
		$this->layout->meta = "";
		$this->layout->name = "";
		$this->layout->content = "";
		$this->layout->head = View::make("front.landing.head");
		$this->layout->body = View::make("front.landing.body");
		$this->layout->foot = View::make("front.landing.foot");
	}
}