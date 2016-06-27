<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('listitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('checked');
            $table->integer('list_id')->unsigned();
            $table->foreign('list_id')
              ->references('id')->on('list')
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
        Schema::drop('listitems');
    }
}
