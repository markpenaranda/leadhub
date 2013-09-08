<?php

$mongo = new Mongo();

$db = $mongo->pinoyrealtv;

/* Dummy Images 
---------------------------*/
$images = array(
	array('path' => '/media/avel.jpg'),
	array('path' => '/media/fnf.jpg'),
	array('path' => '/media/jojoa.jpg'),
	array('path' => 'http://img.youtube.com/vi/Bo5am0NAcfo/0.jpg'),
	array('path' => 'http://img.youtube.com/vi/yElPtXp6RtA/0.jpg')

);



/* Collections
---------------------------*/
$collection_image 	= $db->images;
$collection_shows 	= $db->shows;
$collection_videos 	= $db->videos;
$collection_featured 	= $db->featured;
$collection_category 	= $db->category;
$collection_show_categ 	= $db->show_categ;

//seed the data
seed($collection, $data);

function seed($collection, $data) {

}

/* Image
---------------------------*/

foreach ($images as $image) :
	$collection_image->insert($image);
endforeach;

/* Dummy Shows
---------------------------*/
$shows = array();

$cursor = $collection_image->find();

$cursor_image = array();

foreach ($cursor as $image) :
	array_push($cursor_image, $image['_id']);
endforeach;
echo $cursor_image[2];



$avel = array (
		'name' 		=> "it's me avel",
		'slug' 		=> dasherize("it's me avel"),
		'desc' 		=> "Live, Love, Laugh with the Philippines' fashion designer extraordinaire Avel Bacudio",
		'created_at'=> new mongoDate(),
		'gorated_id'=> '1',
		'enabled'   => '1',
		'image'  => array(
					 '$ref' => "images",
    				 '$id'  => $cursor_image[2])

	);

$collection_shows->insert($avel);


$fnf = array (
		'name' 		=> "fnf",
		'slug' 		=> dasherize("fnf"),
		'desc' 		=> "This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit a",
		'created_at'=> new mongoDate(),
		'gorated_id'=> '1',
		'enabled'   => '1',
		'image'  => array(
					 '$ref' => "images",
    				 '$id'  => $cursor_image[1])

	);


$collection_shows->insert($fnf);


$jojoa = array(
		'name' 		=> 'Mejo Late Night Show',
		'slug' 		=> dasherize("Mejo Late Night Show"),
		'desc' 		=> "As is with American late night TV programs, the show begins with a monologue by Alejar. Alejar then introduces the house band as he proceeds to his desk. After that are the different skits such as. He then introduces his guest and conducts an interview. He also has a segment called Anak ng Photo",
		'created_at'=> new mongoDate(),
		'gorated_id'=> '1',
		'enabled'   => '1',
		'image'  => array(
					 '$ref' => "shows",
    				 '$id'  => $cursor_image[2])
	);

$collection_shows->insert($jojoa);
$shows = $collection_shows->find();
$cursor_shows = array();

foreach ($shows as $show) :
	array_push($cursor_shows, $show['_id']);
endforeach;

$avel_episode1= array(
		'title' 		=> 'Teaser1',
		'youtube_url' 	=> 'Bo5am0NAcfo',
		'slug' 			=> dasherize('episode-1'),
		'description' 	=> 'Description for It\'s me Avel',
		'enabled'		=>	'1',
		'gorated_id'	=> 	'',
		'image'		=>	array(
					 '$ref' => "images",
    				 '$id'  => $cursor_image[2]),
		'show_id'		=>  array(
					 '$ref' => "shows",
    				 '$id'  => $cursor_shows[0])
	);
$collection_videos->insert($avel_episode1);

$mejo_episode1= array(
		'title' 		=> 'Teaser1',
		'youtube_url' 	=> 'Bo5am0NAcfo',
		'slug' 			=> dasherize('episode-1'),
		'description' 	=> 'Description for Medjo Late Night Show',
		'enabled'		=>	'1',
		'gorated_id'	=> 	'',
		'image'		=>	array(
					 '$ref' => "images",
    				 '$id'  => $cursor_image[2]),
		'show_id'		=>  array(
					 '$ref' => "shows",
    				 '$id'  => $cursor_shows[2])
	);

$collection_videos->insert($mejo_episode1);

$collection_featured->insert(array(
			'show' => array(
					 '$ref' => "shows",
    				 '$id'  => $cursor_shows[0]
				)
	));
$collection_featured->insert(array(
			'show' => array(
					 '$ref' => "shows",
    				 '$id'  => $cursor_shows[1]
				)
	));
$collection_featured->insert(array(
						'show' => array(
					 '$ref' => "shows",
    				 '$id'  => $cursor_shows[2]
				)
	));

$category = array(
		array('name' => 'Lifestyle', 'sub_category' => array( array('_id' => new mongoId(), 'name' => 'Fashion'), array('_id' => new mongoId(), 'name' => 'Urban'), array('_id' => new mongoId(), 'name' => 'People'))),
		array('name' => 'Music', 'sub_category' => array( array('_id' => new mongoId(), 'name' => 'HipHop'), array('_id' => new mongoId(), 'name' => 'Rock'), array('_id' => new mongoId(), 'name' => 'Indie'))),
	
	);


foreach ($category as $categ) :
	$collection_category->insert($categ);
endforeach;

$lifestyle_sub_category = $collection_category->find(array('name' => 'Lifestyle'));
$music_sub_category = $collection_category->find(array('name' => 'Music'));

$cursor_lifestyle = array();
$cursor_music     = array();
$cursor_category  = array();

foreach($collection_category->find() as $cc){
	array_push($cursor_category, $cc['_id']);
}

foreach ($lifestyle_sub_category as $lf) {
	array_push($cursor_lifestyle, $lf['_id']);
}

foreach ($music_sub_category as $mf) {
	array_push($cursor_music, $mf['_id']);
}


$x = 0;
// foreach ($shows as $show) :
// 	//$subcateg 

// 	$collection_show_categ->insert(
// 			array('category_id' => $cursor_category[$x],
// 				  'show_id' 	=> $show['_id'],
// 				  'sub_category'=> ''
// 				)
// 		);
// $x++;
// endforeach;

function dasherize($str) {
	$search = array('Ș', 'Ț', 'ş', 'ţ', 'Ş', 'Ţ', 'ș', 'ț', 'î', 'â', 'ă', 'Î', 'Â', 'Ă', 'ë', 'Ë');
	$replace = array('s', 't', 's', 't', 's', 't', 's', 't', 'i', 'a', 'a', 'i', 'a', 'a', 'e', 'E');
	$str = str_ireplace($search, $replace, strtolower(trim($str)));
	$str = preg_replace('/[^\w\d\-\ ]/', '', $str);
	$str = str_replace(' ', '-', $str);
	return preg_replace('/\-{2,}/', '-', $str);
}