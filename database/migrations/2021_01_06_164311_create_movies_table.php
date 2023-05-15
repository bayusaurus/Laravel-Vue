<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('studio');
            $table->date('release');
            $table->date('finish')->nullable();
            $table->string('duration');
            $table->string('trailer');
            $table->string('total_episode')->nullable();
            $table->mediumText('synopsis');
            $table->string('poster_portrait');
            $table->string('poster_landscape');
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
        Schema::dropIfExists('movies');
    }
}
