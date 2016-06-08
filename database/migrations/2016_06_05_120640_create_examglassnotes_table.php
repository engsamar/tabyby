<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamGlassNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_glass_notes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('note');
            $table->integer('reservations_id')->unsigned()->index();
			$table->foreign('reservations_id')->references('id')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exam_glass_notes');
	}

}
