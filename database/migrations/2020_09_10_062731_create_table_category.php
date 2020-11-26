<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',60);
            $table->timestamps();
        });

        // Schema::table('post', function (Blueprint $table) {
        //     $table->foreign('id_category')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
           
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // Schema::table('post', function (Blueprint $table) {
        //     $table->dropForeign('id_category_foreign');
        // });
        Schema::dropIfExists('category');
    }
}
