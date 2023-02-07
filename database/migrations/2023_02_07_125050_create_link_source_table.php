<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkSourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_source', function (Blueprint $table) {
            $table->id();
            $table->foreignId('link_id')->constrained()->on('links')->onDelete('restrict');
            $table->foreignId('source_id')->constrained()->on('sources')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link_source');
    }
}
