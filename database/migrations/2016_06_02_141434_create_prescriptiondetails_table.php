<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prescription_details', function(Blueprint $table) {
            $table->increments('id');
			$table->string('medicine_name');
			$table->tinyInteger('no_times');
			$table->tinyInteger('quantity');
			$table->string('duaration');
			$table->integer('prescription_id')->unsigned()->index();
			$table->foreign('prescription_id')->references('id')->on('prescriptions')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('medicine_id')->unsigned()->index();
			$table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prescription_details');
	}

}
