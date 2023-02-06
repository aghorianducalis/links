<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_link', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->on('categories')->onDelete('restrict');
            $table->foreignId('link_id')->constrained()->on('links')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_link');
    }
}
