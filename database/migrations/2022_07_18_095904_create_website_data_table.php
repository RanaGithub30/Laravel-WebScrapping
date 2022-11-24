<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('website_data', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->text('h1_data')->nullable();
            $table->text('h2_data')->nullable();
            $table->text('h3_data')->nullable();
            $table->text('h4_data')->nullable();
            $table->text('h5_data')->nullable();
            $table->text('h6_data')->nullable();
            $table->text('image_data')->nullable();
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
        Schema::dropIfExists('website_data');
    }
}