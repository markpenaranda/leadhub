<?php

/**
 * Base class for all models
 */
class BaseModel extends MongovelModel {

	public function __construct()
	{
		$args = func_get_args();
		call_user_func_array(array('parent', '__construct'), $args);
	}

	public function isValid()
	{
		return true;
	}

	public function getModel($name)
	{
		//transform the name
		$class = ucfirst( Str::singular($name) );
		$data  = array();

		if(class_exists($class) && array_key_exists($name, $this->attributes)) {
			$attributes  = $this->{$name};
			
			if(is_null($attributes)) {
				return null;
			}

			foreach ($attributes as $attribute) {
				$data[] = new $class($attribute);
			}
		} else {
			$data = null;
		}

		return $data;
	}

	/**
	 * A wrapper in accessing attribute/refence document
	 * Usage:
	 *	getAttribute('image.$ref.path') //will automatically load its refence and get the attribute
	 *	getAttribute('image') 		//gets the attribute of the from the object
	 * @param $key
	 * return $data|null
	 */
	public function getAttribute($key)
	{
		//return if cache already exist
		if (isset($this->attributes[$key])) {
			return $this->attributes[$key];
		}

		//extract the path
		$path = explode('.', $key);
		$data = self::toArray();

		//check if the first attribute exist
		if(empty($path) || !$this->{$path[0]}) {
			return null;
		}

		foreach ($path as $attr) {
			$result = isset($data[$attr]) ? $data[$attr] : false ;
			//check if it is a valid attribute
			if($result) {
				//assign the data to the accessor so that were referencing it on the next loop
				if($attr == '$ref') {
					$data['$id'] = new MongoId($data['$id']);
					$result = self::getCollection()->getDBRef($data);
				}

				if(is_array($result)) {
					$result = $result[0];
				}

				$data = $result;
			} else {
				return null;
			}

		}

		//cache the data so that it will not query everytime
		$this->attributes[$key] = $data;

		return $data;
	}

}