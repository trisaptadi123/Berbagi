<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatadonaturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datadonatur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jumlah',60);
            $table->string('nama',60);
            $table->string('email',60);
            $table->string('nomorhp',60);
            $table->string('komentar',60);
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
        Schema::dropIfExists('datadonatur');
    }
}
