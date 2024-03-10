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
        Schema::create('plant', function (Blueprint $table) {
            $table->uuid('idPlat')->primary();
            $table->string('jenis')->nullable();
            $table->string('umur')->nullable();
            $table->float('tinggi')->nullable();
            $table->float('diameter')->nullable();
            $table->string('warna_daun')->nullable();
            $table->string('idUser')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant');
    }
};
