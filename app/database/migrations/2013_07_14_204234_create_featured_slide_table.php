<?php

use Illuminate\Database\Migrations\Migration;

class CreateFeaturedSlideTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('featured-slide');

		Schema::create('featured-slide', function($table)
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
		Schema::dropIfExists('featured-slide');
	}

}