<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifySendEmailReminderField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ToDo', function (Blueprint $table) {
            $table->string('Notes')->nullable()->change();
            $table->boolean('SendEmailReminder')->nullable()->change();
            $table->dateTime('ReminderDate')->nullable()->change();
            $table->dateTime('DueDate')->nullable()->change();

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
    }
}
