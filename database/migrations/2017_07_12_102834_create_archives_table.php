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
            $table->tinyInteger('shape')->nullable();
            $table->smallInteger('unit');
            $table->smallInteger('building');
            $table->smallInteger('lift');
            $table->string('property', 60);
            $table->string('principal', 30);
            $table->string('mobile', 11);
            $table->float('shape_length', 20, 6)->nullable();
            $table->float('shape_area', 20, 6)->nullable();

            $table->boolean('show')->default(1);
            $table->unsignedInteger('creater');
            $table->foreign('creater')->references('id')->on('users');
            $table->unsignedInteger('modifier');
            $table->foreign('modifier')->references('id')->on('users');

            $table->timestamps();
        });

        // once the table is created use a raw query to ALTER it and add the MEDIUMBLOB
        DB::statement("ALTER TABLE archives ALTER COLUMN shape_length TYPE numeric");
        DB::statement("ALTER TABLE archives ALTER COLUMN shape_area TYPE numeric");

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
