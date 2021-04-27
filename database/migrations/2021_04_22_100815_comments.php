<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigInteger('id')->unique()->unsigned();
            $table->bigInteger('author_id');
            $table->foreign('author_id')->unsigned()->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('recipe_id');
            $table->foreign('recipe_id')->unsigned()->references('id')->on('recipes')->onDelete('cascade');;


            $table->mediumText('content');
            $table->dateTime('date')->nullable();

            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();

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
