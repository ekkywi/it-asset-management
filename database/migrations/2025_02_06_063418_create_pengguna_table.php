<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->uuid('bagian_id');
            $table->uuid('jabatan_id');
            $table->uuid('peran_id');
            $table->boolean('login_aplikasi')->default(false);
            $table->timestamps();

            $table->foreign('bagian_id')->references('id')->on('bagian')->onDelete('cascade');
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
            $table->foreign('peran_id')->references('id')->on('peran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
