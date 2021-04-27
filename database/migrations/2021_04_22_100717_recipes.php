<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recipes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->BigInteger('id')->unique()->unsigned();
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->unsigned()->references('id')->on('users');

            $table->mediumText('title');
            $table->longText('content');
            $table->longText('ingredients');
            $table->string('url',200);

            $table->text('tags')->nullable();
            $table->dateTime('date');
            $table->string('status',45);
            $table->string('image_path')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
