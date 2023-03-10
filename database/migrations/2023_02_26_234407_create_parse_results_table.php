<?php

use App\Services\ParseResultConstants as Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParseResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $charset = "utf8mb4";
        $collation = "utf8mb4_unicode_ci";

        Schema::create('parse_results', function (Blueprint $table) use ($charset, $collation) {
            $table->id();
            $table->foreignId('link_id')->constrained()->on('links')->onDelete('restrict');
            $table->timestamp('parsed_at')->nullable();
            $table->enum('status', [
                Constants::SUCCESS,
                Constants::ERROR,
            ]);
            $table->text('content')
                ->nullable()
                ->charset($charset)
//                ->collation($collation)
            ;
            $table->text('error_message')
                ->nullable()
                ->charset($charset)
//                ->collation($collation)
            ;
            $table->string('title')
                ->nullable()
                ->charset($charset)
//                ->collation($collation)
            ;
            $table->text('icon')->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('parse_results');
    }
}
