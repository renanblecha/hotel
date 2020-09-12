<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuartosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quartos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('imagem')->nullable();
//            $table->integer('quantidade');
//            $table->unsignedBigInteger('categoria_id')->nullable()->index();
//            $table->unsignedBigInteger('hotel_id')->nullable()->index();
//            $table->foreign('hotel_id')->references('id')->on('hotels');
//            $table->foreign('categoria_id')->references('id')->on('hotels');
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
        Schema::dropIfExists('quartos');
    }
}
