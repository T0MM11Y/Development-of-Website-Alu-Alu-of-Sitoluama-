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
        Schema::create('alualus', function (Blueprint $table) {
            $table->id();
            $table->string('to');
            $table->string('from');
            $table->string('isi');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('last_usage')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alualus');
    }
};
