<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreceptionDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('preception_details', function(Blueprint $table) {
            $table->increments('id');
            $table->string('medicine_name');
            $table->tinyInteger('no_times');
            $table->tinyInteger('quantity');
            $table->string('duaration');
            $table->integer('preception_id')->unsigned()->index();
            $table->foreign('preception_id')->references('id')->on('prescriptions')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('preception_details');
	}

}
