<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->unsignedBigInteger('hotels_has_quartos_has_categoria_id')->index();
            $table->foreign('hotels_has_quartos_has_categoria_id')->references('id')->on('hotels_has_quartos_has_categorias');
            $table->unsignedBigInteger('pessoa_id')->index();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('reservas');
    }
}
