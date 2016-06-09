<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalHistoryDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medical_history_details', function(Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('medical_history_id')->unsigned();
            $table->foreign('medical_history_id')->references('id')->on('medical_histories')->onDelete('cascade')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medical_history_details');
	}

}
