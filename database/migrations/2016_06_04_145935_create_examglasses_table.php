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
            $table->float('sphr');
            $table->float('cylr');
            $table->float('axisr');
            $table->float('sphl');
            $table->float('cyll');
            $table->float('axisl');
            $table->integer('exam_glass_type');
            $table->integer('reservation_id')->unsigned()->index();
			$table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
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
