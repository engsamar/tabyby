<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecertariesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secertaries', function(Blueprint $table) {
            $table->increments('id');
            $table->string('degree');
            $table->string('national_id')->unique();
            $table->integer('userRole_id')->unsigned();
            $table->foreign('userRole_id')->references('id')->on('user_roles')->onDelete('cascade');
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
        Schema::drop('secertaries');
    }

}