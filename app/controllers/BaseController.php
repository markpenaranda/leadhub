<?php

class BaseController extends Controller {

	protected $layout = 'front.layouts.default';

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout() {

		if ( ! is_null($this->layout)) {
			$this->layout = View::make($this->layout);
		}

	}

	protected function toObject($data)
	{
		return new ObjectAccess($data);
	}
	/**
	 *  Mongodb Helper
	 *  @param $collection
	 *  @param $cursor
	 *  @param $field
	 *  @return Object
	 */
	protected function generateRef($collection, $cursor, $field) {
		$res = array();
	
		if(!$cursor instanceof Mongovel\Cursor){
			return $this->_generateFindOne($collection, $cursor, $field);
		}
		else{
			foreach ($cursor as $curs) {
				array_push($res, $this->_generateFindOne($collection, $curs, $field));
			}
			
			return $res;
		}
	
	}

	private function _generateFindOne($collection, $array, $field){
		$ref = $collection->getDBRef($array->$field);
		$array->$field = $this->toObject($ref);
		return $array;	
	}


	// public function missingMethod($parameters)
	// {
	//     	App::abort(404, $parameters);
	// }
}