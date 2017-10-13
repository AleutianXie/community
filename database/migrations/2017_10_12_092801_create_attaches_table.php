<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attaches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aid');
            $table->foreign('aid')->references('id')->on('archives');
            $table->string('name', 255);
            $table->string('path', 255);
            $table->boolean('show')->default(1);
            $table->unsignedInteger('creater');
            $table->foreign('creater')->references('id')->on('users');
            $table->unsignedInteger('modifier');
            $table->foreign('modifier')->references('id')->on('users');
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
        Schema::dropIfExists('attaches');
    }
}
