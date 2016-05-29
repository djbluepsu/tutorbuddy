<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function(Blueprint $table){
            $table->increments('id');
            $table->integer('tutee_id');
            $table->integer('tutor_id');
            $table->string('class');
            $table->boolean('accepted');
            $table->boolean('declined');
            $table->integer('subject');
            $table->boolean('handshakeSent');
            $table->string('time');
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
        Schema::drop('friends');
    }
}
