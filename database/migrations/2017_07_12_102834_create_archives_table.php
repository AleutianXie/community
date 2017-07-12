<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('archives', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 60)->unique();
            $table->string('address', 255);
            $table->tinyInteger('shape');
            $table->smallInteger('unit');
            $table->smallInteger('building');
            $table->smallInteger('lift');
            $table->string('property', 60);
            $table->string('principal', 30);
            $table->string('mobile', 11);
            $table->float('shape_length', 20, 6);
            $table->float('shape_area', 20, 6);

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
        //
        Schema::dropIfExists('archives');
    }
}
