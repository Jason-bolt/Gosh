<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->text('business_name');
            $table->unsignedInteger('industry_id');
            $table->text('business_image');
            $table->text('business_location');
            $table->text('business_description');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('accepted')->nullable();
            $table->foreign('industry_id')
                ->references('id')
                ->on('industries');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('businesses');
    }
}
