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
          
            $table->bigIncrements('id');
            $table->string('name_product');
            $table->integer('prix_product');
            $table->string('image_product');
            $table->string('description_product');
            $table->integer('whatsapp_product');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('sous_category_id');
            $table->unsignedInteger('localite_id');
            $table->unsignedInteger('business_id')->nullable();
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
