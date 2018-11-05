<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');    
            $table->string('slug');        
            $table->string('runningtime')->nullable();
            $table->string('yearfinish')->nullable();
            $table->text('award')->nullable();
            $table->string('photo')->nullable();
            $table->string('single_photo')->nullable();
            $table->text('synopsis')->nullable();
            $table->string('youtube_url')->nullable();
            $table->integer('views')->nullable();
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
        Schema::dropIfExists('films');
    }
}
