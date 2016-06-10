<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorDegreesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctor_degrees', function(Blueprint $table) {
            $table->increments('id');
            $table->string('degree');
            $table->string('university');
            $table->string('description');
            $table->date('graduate_date');
            $table->integer('userrole_id')->unsigned()->index();
			$table->foreign('userrole_id')->references('id')->on('user_roles')->onDelete('cascade')->onUpdate('cascade');

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
		Schema::drop('doctor_degrees');
	}

}
