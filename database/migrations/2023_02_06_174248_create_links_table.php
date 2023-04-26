<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('url', 500)->unique();
            $table->string('title', 500);
            $table->string('icon', 2000)->nullable();
            $table->timestamp('added_at')->nullable();
            $table->foreignId('content_type_id')
                ->nullable()
                ->constrained()
                ->on('content_types')
                ->onDelete('restrict');
            $table->foreignId('domain_id')
                ->nullable()
                ->constrained()
                ->on('domains')
                ->onDelete('restrict');
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
        Schema::dropIfExists('links');
    }
}
