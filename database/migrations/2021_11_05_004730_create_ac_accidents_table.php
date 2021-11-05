<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcAccidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_accidents', function (Blueprint $table) {
            $table->increments('ac_id');
            $table->string('ac_type',40);
            $table->string('ac_severity',40);
            $table->string('ac_description',300);
            $table->integer('us_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('ac_accidents', function ($table) {
            $table->foreign('us_id')
                    ->references('us_id')
                    ->on('ac_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ac_accidents');
    }
}
