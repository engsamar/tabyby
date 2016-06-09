<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->index()->default(0);
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('clinic_id')->unsigned()->index();
			$table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('reservation_type_id')->unsigned();
			//$table->foreign('reservation_type_id')->references('id')->on('reserve_types')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('parent_id')->unsigned()->index()->nullable();
    		$table->foreign('parent_id')->references('id')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
			$table->date('date');
			$table->time('appointment');
			$table->integer('status');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reservations');
	}

}
