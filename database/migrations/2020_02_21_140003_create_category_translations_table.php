<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_translations', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->unsignedBigInteger('CategoryId')->nullable();
            $table->foreign('CategoryId')->references('Id')->on('categories')->onDelete('set null');
            $table->unsignedBigInteger('LanguageId')->nullable();
            $table->foreign('LanguageId')->references('Id')->on('languages')->onDelete('set null');
            $table->string('Name',50);
            $table->string('Description',50);
            $table->text('Details');
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
        Schema::dropIfExists('category_translations');
    }
}
