<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medicines', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', array('eye_drops','eye_ointment','capsule','tablet','syurp','suspension','Anti_glucoma','Lubricant'));
            $table->string('company');
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
		Schema::drop('medicines');
	}

}
