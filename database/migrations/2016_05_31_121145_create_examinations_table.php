<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('eye_type');
            $table->integer('vision');
            $table->string('lid');
            $table->string('conjunctiva');
            $table->string('cornea');
            $table->string('a_c');
            $table->string('pupil');
            $table->string('lens');
            $table->string('fundus');
            $table->integer('i_o_p'); //numbers from 1 : 60
            $table->string('angle');
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
        Schema::drop('examinations');
    }

}