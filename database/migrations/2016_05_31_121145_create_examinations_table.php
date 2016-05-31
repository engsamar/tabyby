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
            $table->enum('eye_type', array('Right', 'Left'));
            $table->enum('vision', array('6/6', '6/9', '6/12', '6/18', '6/24', '6/36', '6/60', '5/60', '4/60', '3/60', '2/60', '1/60', 'H.M', 'PL', 'No_Pl'));
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
        Schema::drop('examinations');
    }

}