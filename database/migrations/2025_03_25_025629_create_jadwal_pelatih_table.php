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
        Schema::create('jadwal_pelatih', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelatih_id')->constrained('pelatih')->onDelete('cascade');
            $table->date('Tanggal');
            $table->time('JamMulai');
            $table->time('JamSelesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelatih');
    }
};
