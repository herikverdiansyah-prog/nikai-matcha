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
            $table->string('name');
            $table->string('slug')->unique(); // Untuk URL ramah SEO (misal: /products/ajisai-takara)
            $table->integer('original_price'); // Harga asli/coret
            $table->integer('sale_price')->nullable(); // Harga diskon (kosongkan jika tidak sale)
            $table->string('image')->nullable(); // Nama file/path foto produk
            $table->text('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
