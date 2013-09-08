<?php

class ProjectController extends \BaseController {

	public function postSaveproject(){
		if(!Session::has('leadhub_id')){
			return false;
		}
		$title = Input::get('title');
		$description = Input::get('description');
		$message =  'Is planning a ' . $title . ' ' . $description . " #" . str_replace(' ', '', $title) . ' #LeadHub';
		Twitter::tweetStatus($message);
		$project = new Project;
		$project->title = $title;
		$project->description = $description;
		$project->author = Session::get('leadhub_id');
		$project->created_at = new MongoDate();
		$project->status = "planning";
		$project->save();
		$projectList = Project::getAllProjects();
		$planningList = Project::getAllProjects();
		$planningList = Project::getAllProjects();

		$data = array('items' => $projectList
								
			);

		
		return View::make('front/block/item')->with($data);
		
	}

	public function getArticle(){



		$projectList = Project::getAllProjects();
		$data = array('items' => $projectList);

		return View::make('front/block/item')->with($data);	
	}


	public function postStatus(){

		$project = new Project;
		$status = Input::get('status');
		$id = Input::get('id');
		switch ($status) {
			case 'start':
				// $project->status = "onprocess";
				// $project->update($id);
			$data = array('status' => 'onprocess');
				$project = Project::findOne($id);
				$title = $project->title;
				$description = $project->title;
				$message =  'Is starting a ' . $title . ' ' . $description . " #" . str_replace(' ', '', $title) . ' #LeadHub';
				Twitter::tweetStatus($message);
				Project::update(array('_id' => new MongoId($id)), array('$set' => $data));
				break;
			case 'done':
				$data = array('status' => 'done');			
			$project = Project::findOne($id);
				$title = $project->title;
				$description = $project->title;
				$message =  'Has finished  ' . $title . ' ' . $description . " #" . str_replace(' ', '', $title) . ' #LeadHub';
				Twitter::tweetStatus($message);
					Project::update(array('_id' => new MongoId($id)), array('$set' => $data));
				break;	
			}
	
			$projectList = Project::getAllProjects();


		$data = array('items' => $projectList		
			);

		
		return View::make('front/block/item')->with($data);


	}


}