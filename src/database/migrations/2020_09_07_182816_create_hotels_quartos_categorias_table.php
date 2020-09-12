<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsQuartosCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels_has_quartos_has_categorias', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->decimal('valor',9,2);
            $table->unsignedBigInteger('hotel_id')->nullable()->index();
            $table->unsignedBigInteger('quarto_id')->nullable()->index();
            $table->unsignedBigInteger('categoria_id')->nullable()->index();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('quarto_id')->references('id')->on('quartos');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unique(['hotel_id','quarto_id','categoria_id'], 'hotels_has_quartos_has_categorias_unique');
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
        Schema::dropIfExists('hotels_has_quartos_has_categorias');
    }
}
