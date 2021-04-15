<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moves', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_mov');
            $table->string('detalle');
            $table->decimal('importe');
            $table->string('image')->nullable();
            $table->tinyInteger('conciliado')->default(0); //0 no conciliado/1 si conciliado
            $table->enum('tipo', ['Ingreso', 'Egreso']);
            $table->unsignedBigInteger('box_id');
            $table->unsignedBigInteger('concept_id');
            $table->timestamps();

            //Llaves foráneas
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('concept_id')->references('id')->on('concepts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moves');
    }
}
