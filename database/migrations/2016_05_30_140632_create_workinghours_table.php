<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingHoursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('working_hours', function(Blueprint $table) {
            $table->increments('id');
			$table->time('fromTime');
			$table->time('toTime');
			$table->string('day');
			$table->integer('clinic_id')->unsigned()->index();
			$table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('working_hours');
	}

}
