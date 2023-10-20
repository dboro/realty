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
        Schema::create('realty_items', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string('img')->nullable();
            $table->unsignedTinyInteger('floor');
            $table->unsignedTinyInteger('room_count');
            $table->unsignedSmallInteger('square');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realty_items');
    }
};
