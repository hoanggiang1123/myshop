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
            $table->bigIncrements('Id');
            $table->decimal('Price',8,2);
            $table->decimal('OriginalPrice',8,2);
            $table->integer('Stock');
            $table->integer('ViewCount')->default(0);
            $table->string('Name',50);
            $table->string('Description')->nullable();
            $table->string('Slug',50)->unique();
            $table->string('Keyword')->nullable();
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
}>
