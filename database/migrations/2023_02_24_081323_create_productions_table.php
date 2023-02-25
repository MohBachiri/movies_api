<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("trailePath");
            $table->string("posterPath");
            $table->date("releaseDate");
            $table->string("language");

            $table->integer("voteCount")->default(0);
            $table->float("voteAverage")->default(0.0);
            $table->boolean("isSeries");
            $table->integer("sesionCount")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
