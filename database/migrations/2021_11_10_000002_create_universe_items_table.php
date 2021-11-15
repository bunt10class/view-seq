<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniverseItemsTable extends Migration
{
    public function up(): void
    {
        Schema::create('universe_items', function (Blueprint $table) {
            $table->id('universe_item_id');
            $table->unsignedBigInteger('universe_id');
            $table->string('name');
            $table->string('art_item_type');
            $table->string('released_at')->nullable();
            $table->unsignedBigInteger('next_id_in_chronology')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('universe_id')->references('universe_id')->on('universes');
            $table->foreign('next_id_in_chronology')->references('universe_item_id')->on('universe_items')
                ->onDelete('set null');
            $table->index('art_item_type');
            $table->index('released_at');
            $table->index(['art_item_type', 'released_at']);
        });
    }

    public function down(): void
    {
        Schema::table('universe_items', function (Blueprint $table) {
            $table->dropForeign('universe_items_universe_id_foreign');
            $table->dropForeign('universe_items_next_id_in_chronology_foreign');
        });
        Schema::dropIfExists('universe_items');
    }
}
