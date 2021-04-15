<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('bar_code', 13)->unique()->nullable();
            $table->string('name', 100)->unique();
            $table->string('slug');
            $table->string('description', 255);
            $table->integer('stock')->default(0);
            $table->string('image', 255)->nullable();
            $table->decimal('sell_price', 12, 2);
            $table->enum('status', ['ACTIVE', 'DEACTIVATED'])->default('ACTIVE');
            $table->timestamps();

            //Llaves foráneas.
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
