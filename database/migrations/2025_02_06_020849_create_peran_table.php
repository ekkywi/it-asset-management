<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up(): void
    {
        Schema::create('peran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_peran');
            $table->string('tag_peran');
            $table->string('keterangan')->nullable();
            $table->string('warna_peran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('peran');
    }
};
