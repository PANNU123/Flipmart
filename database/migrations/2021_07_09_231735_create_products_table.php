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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('product_name');
            $table->string('slug')->unique();
            $table->string('model');
            $table->decimal('buying_price',10,2);
            $table->decimal('selling_price',10,2);
            $table->decimal('special_price',10,2)->nullable();
            $table->date('special_start')->nullable();
            $table->date('special_end')->nullable();
            $table->integer('quantity');
            $table->string('video_url')->nullable();
            $table->tinyInteger('warranty')->default(0);
            $table->string('warranty_duration')->nullable();
            $table->string('warranty_conditions')->nullable();
            $table->string('thumbnail');
            $table->string('galary')->nullable();
            $table->string('short_description');
            $table->longtext('long_description')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
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
