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
        Schema::create('layanancategoryms', function (Blueprint $table) {
            $table->id();
            $table->string('layanan_category')->nullable();
            $table->string('layanan_category_image')->nullable();
            $table->string('jelajah_category_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanancategoryms');
    }
};
