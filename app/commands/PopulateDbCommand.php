<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Hashids\Hashids;

class PopulateDbCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'populate_db';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$shows 		= Show::getCollection();
		$images 	= Image::getCollection();
		$Category 	= Category::getCollection();
		$playlist 	= Playlist::getCollection();
		
		$shows->remove();
		$Category->remove();
		// foreach ($this->dummyImage() as $image) :
		// 	$this->addNewItem($images, $image);
		// endforeach;

		foreach ($this->dummyCategory() as $category) :
			$this->addNewItem($Category, $category);
		endforeach;
		foreach ($this->dummySubCategory() as $category) :
			$this->addNewItem($Category, $category);
		endforeach;
		foreach ($this->dummyShows() as $show) :
			$this->addNewItem($shows, $show);
		endforeach;
		foreach ($this->playlist() as $item) :
			$this->addNewItem($playlist, $item);
		endforeach;
		
	}

	/* Private Functions
	--------------------------------------*/
	
	// Thinking to remove the Image Collection...
/*
	private function dummyImage(){

		return $images = array(
			array('_id' => new mongoId(), 'path' => '/media/avel.jpg'),
			array('_id' => new mongoId(), 'path' => '/media/fnf.jpg'),
			array('_id' => new mongoId(), 'path' => '/media/jojoa.jpg'),
			array('_id' => new mongoId(), 'path' => 'http://img.youtube.com/vi/Bo5am0NAcfo/0.jpg'),
			array('_id' => new mongoId(), 'path' => 'http://img.youtube.com/vi/yElPtXp6RtA/0.jpg')

		);

	}
*/
	private function playlist()
	{
		return array( array(
			'video' 	=> array(
				'title' 	=> 'Mejo Late Night Episode 1',
				'youtube_url' 	=> 'Bo5am0NAcfo',
				'image'		=> '',
				'description' 	=> 'Description for It\'s me Avel',
				'enabled'	=> 1
			),
			'created_at' 	=> new MongoDate,
			'updated_at' 	=> new MongoDate			
		),
		array(
			'video' 	=> array(
				'title' 	=> 'Mejo Late Night Episode 2',
				'youtube_url' 	=> 'rXpPOCiZP0M',
				'image'		=> '',
				'description' 	=> 'Description for It\'s me Avel',
				'enabled'	=> 1
			),
			'created_at' 	=> new MongoDate,
			'updated_at'	=> new MongoDate,
		),
		array(
			'video' 	=> array(
				'title' 	=> 'Mejo Late Night Episode 3',
				'youtube_url' 	=> 'yElPtXp6RtA',
				'image'		=> '',
				'description' 	=> 'Description for It\'s me Avel',
				'enabled'	=> 1
			),
			'created_at' 	=> new MongoDate,
			'updated_at'	=> new MongoDate,
		));
	}

	private function dummyShows(){

		return $shows = array( array (
			'name' 		=> "it's me avel",
			'slug' 		=> Str::slug("it's me avel"),
			'description' 	=> "Live, Love, Laugh with the Philippines' fashion designer extraordinaire Avel Bacudio",
			'created_at'	=> new MongoDate(),
			'last_update'	=> new MongoDate(),
			'gorated_id' 	=> 1,
			'enabled'   	=> 1,
			'featured'		=> 1,
			'category'		=> Category::findOne(array('name' => 'Lifestyle'), array('_id'))->_id,
			'images' 		=> array(
								array(	'enabled'=> 1,
			    					 	'path'  => '/media/avel.jpg')
							),
			'videos'		=> array(
				array (
					'title' 		=> 'Avel Episode 1',
					'youtube_url' 	=> 'Bo5am0NAcfo',
					'description' 	=> 'Description for It\'s me Avel',
					'image'			=> '',
					'enabled'		=> 1 ),
				array(
					'title' 		=> 'Avel Episode 2',
					'youtube_url' 	=> 'rXpPOCiZP0M',
					'image'			=> '',
					'description' 	=> 'Description for It\'s me Avel',
					'enabled'		=> 1 ),
				array(
					'title' 		=> 'Avel Episode 3',
					'youtube_url' 	=> '8glKM3gcm6c',
					'image'			=> '',
					'description' 	=> 'Description for It\'s me Avel',
					'enabled'		=> 1 ))
		),
		array (
			'name' 			=> "F n F",
			'slug' 			=> Str::slug("F n F"),
			'description' 	=> "This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel.",
			'created_at'	=> new MongoDate(),
			'last_update'	=> new MongoDate(),
			'gorated_id'	=> 1,
			'enabled'   	=> 1,
			'featured'		=> 1,
			'category'		=> Category::findOne(array('name' => 'Music'), array('_id'))->_id,
			'images' 		=> array(
								array(	'enabled'=> 1,
			    					 	'path'  => '/media/fnf.jpg')
							),
			'videos'			=> array(
				array (
					'title' 		=> 'F n F Episode 1',
					'youtube_url' 	=> '-hcTMqOzVDk',
					'image'			=> '',
					'description' 	=> 'Description for It\'s me Avel',
					'enabled'		=> 1 ),
				array(
					'title' 		=> 'F n F Episode 2',
					'youtube_url' 	=> '_iDKLfYV6mM',
					'image'			=> '',
					'description' 	=> 'Description for It\'s me Avel',
					'enabled'		=> 1 ),
				array(
					'title' 		=> 'F n F Episode 3',
					'youtube_url' 	=> 'e9Th8gE4Qj8',
					'image'			=> '',
					'description' 	=> 'Description for It\'s me Avel',
					'enabled'		=> 1 ))
		),
		array (
			'name' 		=> "Mejo Late Night Show with JOJO A.",
			'slug' 		=> Str::slug("Mejo Late Night Show with JOJO A."),
			'description' 	=> "As is with American late night TV programs, the show begins with a monologue by Alejar. Alejar then introduces the house band as he proceeds to his desk. ",
			'created_at' 	=> new mongoDate(),
			'last_update'	=> new MongoDate(),
			'gorated_id' 	=> 1,
			'enabled' 		=> 1,
			'featured'		=> 1,
			'category'		=> Category::findOne(array('name' => 'Sports'), array('_id'))->_id,
			'images' 	=> array(
								array(	'enabled'=> 1,
			    					 	'path'  => '/media/jojoa.jpg')
							),
			'videos'	=> array(
				array (
					'title' 		=> 'Mejo Late Night Episode 1',
					'youtube_url' 	=> 'Bo5am0NAcfo',
					'image'			=> '',
					'description' 	=> 'Description for It\'s me Avel',
					'enabled'		=> 1 ),
				array(
					'title' 		=> 'Mejo Late Night Episode 2',
					'youtube_url' 	=> 'rXpPOCiZP0M',
					'image'			=> '',
					'description' 	=> 'Description for It\'s me Avel',
					'enabled'		=> 1 ),
				array(
					'title' 		=> 'Mejo Late Night Episode 3',
					'youtube_url' 	=> 'yElPtXp6RtA',
					'image'			=> '',
					'description' 	=> 'Description for It\'s me Avel',
					'enabled'		=> 1 ))
		));
	}

	public function dummyCategory(){
		return array(
				array(
					'name' => 'Lifestyle',
					'slug' => Str::slug('Lifestyle')
					),
				array(
					'name' => 'Sports',
					'slug' => Str::slug('Sports')
					),
				array(
					'name' => 'Music',
					'slug' => Str::slug('Music')			
					)
		);
	}

	public function dummySubCategory(){
		return array(

			 array(
					'name' 		=> 'Fashion',
					'_id'		=> new mongoId(),
					'slug'		=> Str::slug('Fashion'),
					'parent'	=>	Category::findOne(array('name' => 'Lifestyle'))->_id
				),
			 array(
					'name' 		=> 'Health',
					'_id'		=> new mongoId(),
					'slug'		=> Str::slug('Health'),
					'parent'	=>	Category::findOne(array('name' => 'Lifestyle'))->_id
				),
				array(
					'name' 		=> 'Basketball',
					'_id'		=> new mongoId(),
					'slug'		=> Str::slug('Basketball'),
					'parent'	=>	Category::findOne(array('name' => 'Sports'))->_id
				
				),
			array(
					'name' 		=> 'Soccer',
					'_id'		=> new mongoId(),
					'slug'		=> Str::slug('Soccer'),
					'parent'	=>	Category::findOne(array('name' => 'Sports'))->_id
				
				),
			array(
					'name' 		=> 'Volleyball',
					'_id'		=> new mongoId(),
					'slug'		=> Str::slug('Volleyball'),
					'parent'	=>	Category::findOne(array('name' => 'Sports'))->_id
				
				),
			array(	'name' 		=> 'Rock',
					'_id'		=> new mongoId(),
					'slug'		=> Str::slug('Rock'),
					'parent'	=>	Category::findOne(array('name' => 'Music'))->_id
				
				),
			array(
				'name' 		=> 'Classic',
				'_id'		=> new mongoId(),
				'slug'		=> Str::slug('Classic'),
				'parent'	=>	Category::findOne(array('name' => 'Music'))->_id
				
				)

			);
	}


	/* Protected Functions
	--------------------------------------*/


	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */

	protected function addNewItem($collection, $data){
		$collection->insert($data,  array("upsert" => true));
	}

	protected function getArguments()
	{
		return array(
			array('example', InputArgument::OPTIONAL, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

	public function getSubCategoryId($name){
		$categ = Category::findOne(array('sub_category.name' => $name));
		foreach ($categ->sub_category as $c) :
			if($c['name'] == $name):
				return $c['_id'];
			endif;
		endforeach;
		
		return NULL;

	}
}