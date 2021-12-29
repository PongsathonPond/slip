<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listalls', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('lastname');
            $table->string('number');
            $table->string('sum');
            $table->string('cash');
            $table->string('listall');
            $table->string('total');
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
        Schema::dropIfExists('listalls');
    }
}
