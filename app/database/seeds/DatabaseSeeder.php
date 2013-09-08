<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ChannelTableSeeder');
	}

}

class ChannelTableSeeder extends Seeder {

    public function run()
    {
        DB::table('channels')->delete();

        Channel::create(array(
        	'name' 			=> 'My Test Channel',
        	'slug' 			=> 'awslug',
        	'description' 	=> 'This is just a test',
        	'profile_pic'	=> null,
        	'active'		=> 1
    	));

    	 Channel::create(array(
        	'name' 			=> 'Another Test Channel',
        	'slug' 			=> 'sluggy',
        	'description' 	=> 'Just another test channel',
        	'profile_pic'	=> null,
        	'active'		=> 1
    	));
    }

}