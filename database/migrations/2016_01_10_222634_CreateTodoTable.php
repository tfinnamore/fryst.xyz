<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ToDo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('Notes');
            $table->boolean('SendEmailReminder');
            $table->dateTime('ReminderDate');
            $table->dateTime('DueDate');
            $table->string('Urgency');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');
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
        //
        Schema::drop('ToDo');
    }
}
