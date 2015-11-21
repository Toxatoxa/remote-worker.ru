<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

            $table->unique('name');
        });

        Schema::create('record_tag', function (Blueprint $table) {
            $table->integer('record_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();

            $table->foreign('record_id')
                ->references('id')
                ->on('records');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
        Schema::drop('record_tag');
    }
}
