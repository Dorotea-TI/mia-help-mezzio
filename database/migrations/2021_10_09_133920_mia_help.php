<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MiaHelp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mia_help', function (Blueprint $table) {
            $table->id();

            $table->integer('language_id');
    $table->integer('category_id');
    $table->string('title');
    $table->text('content');
    $table->integer('likes');
    $table->integer('dislikes');
    $table->integer('status');
    

            $table->foreign('category_id')->references('id')->on('mia_category');$table->foreign('language_id')->references('id')->on('mia_language');

            $table->timestamps();

            $table->integer('deleted')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mia_help');
    }
}