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
    Schema::create('deskripsi_umums', function (Blueprint $table) {
        $table->id('id_data');
        $table->unsignedBigInteger('id_abstrak')->nullable();
        $table->string('observer');
        $table->string('lokasi_observasi');
        $table->date('tanggal_observasi');
        $table->string('metode_analisis');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deskripsi_umums');
    }
};
