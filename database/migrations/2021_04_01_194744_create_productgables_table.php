<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductgablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productgables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productgable_id');
            $table->string('productgable_type');
            $table->decimal('quantity', 12, 3);
            $table->decimal('price');
            $table->decimal('discount')->nullable();

            //Campo para llave foránea
            $table->unsignedBigInteger('product_id');

            //Restricciones para llave foránea
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
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
        Schema::dropIfExists('productgables');
    }
}
