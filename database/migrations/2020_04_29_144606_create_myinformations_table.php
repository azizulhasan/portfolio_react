<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myinformations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('father');
            $table->string('mother');
            $table->string('email'); 
            $table->string('phone');
            $table->string('birth');
            $table->longText('present');
            $table->longText('permanet');
            $table->string('nationality');
            $table->string('married');
            $table->longText('designation');
            $table->string('blood');
            $table->string('gender');
            $table->longText('description');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('myinformations');
    }
}
