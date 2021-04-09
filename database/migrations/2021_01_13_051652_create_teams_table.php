<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('owner');
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->integer('points')->default(0);
            $table->string('bestResult')->default('0');
            $table->integer('tournaments')->default(0);
            $table->integer('status')->default(1);
            $table->string('access_code')->unique();
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
        Schema::dropIfExists('teams');
    }
}
