<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id');
            $table->string('title',150);
            $table->string('type',25)->default('standard');
            $table->string('description')->nullable();
            $table->string('image',100)->nullable();
            $table->float('price')->nullable();
            $table->integer('beds')->nullable();
            $table->string('view',25)->nullable();
            $table->string('tv',5)->nullable()->default('yes');
            $table->string('wifi',5)->nullable()->default('yes');
            $table->string('air_conditioner',5)->nullable()->default('yes');
            $table->string('details')->nullable();
            $table->string('available',5)->default('no');
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
        Schema::dropIfExists('rooms');
    }
}
