<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainDetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complain_details', function(Blueprint $table) {
            $table->increments('id');
            $table->string('diagnose');
            $table->string('plan');
            $table->integer('complain_id')->unsigned();
            $table->foreign('complain_id')->references('id')->on('complains')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('complain_details');
    }

}