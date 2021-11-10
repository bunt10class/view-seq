<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversesTable extends Migration
{
    public function up(): void
    {
        Schema::create('universes', function (Blueprint $table) {
            $table->id('universe_id');
            $table->string('en_name')->nullable();
            $table->string('ru_name')->nullable();
            $table->string('creator')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('universes');
    }
}
