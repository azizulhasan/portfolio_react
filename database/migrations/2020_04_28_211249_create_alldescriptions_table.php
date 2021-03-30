<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlldescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alldescriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('profile');
            $table->longText('skill');
            $table->longText('resume');
            $table->longText('education');
            $table->longText('experience');
            $table->longText('portfolio');
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
        Schema::dropIfExists('alldescriptions');
    }
}
