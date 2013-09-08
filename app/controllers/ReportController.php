<?php

class ReportController extends \BaseController {

	public function postPatrol(){
		$caption = Input::get('caption');
		$user_id = Input::get('user_id');
		$file = Input::file('file');
		$points = 0;
		$user = User::getProfile();
		$user_fb = $user->facebook_token;

		$report = new Report;
		$report->caption = $caption;
		$report->user = $user_id;
		$report->file = $file;
		$report->points = $points;
		$post = Facebook::postReport($caption, $file);

		

		//API Goes here...
		// Facebook::postReport($caption, $file);

	}

	public function postPoint(){
		$report_id = Input::get('reportid');
		$report_point = Input::get('reportpoint');
	}

	


}
