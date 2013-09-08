<?php

use Illuminate\Database\Migrations\Migration;

class CreateFeaturedListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('featured-list');

		Schema::create('featured-list', function($table)
        {
            $table->increments('id');
            $table->integer('channel_id')->unsigned();
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('featured-list');
	}

}