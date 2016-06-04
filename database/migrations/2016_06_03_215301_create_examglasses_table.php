<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamGlassesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_glasses', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('eye_type');
			$table->integer('exam_glass_type');
			$table->float('spl');
			$table->float('cyl');
			$table->float('axis');
			$table->integer('reservation_id')->unsigned();
			$table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('exam_glasses');
	}

}
