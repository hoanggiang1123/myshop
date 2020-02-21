<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_translations', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->unsignedBigInteger('ProductId')->nullable();
            $table->foreign('ProductId')->references('Id')->on('products')->onDelete('set null');
            $table->string('Name',50);
            $table->string('Description',50)->nullable();
            $table->text('Details');
            $table->unsignedBigInteger('LanguageId')->nullable();
            $table->foreign('LanguageId')->references('Id')->on('languages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_translations');
    }
}
