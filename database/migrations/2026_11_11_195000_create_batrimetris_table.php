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
    Schema::create('batimetris', function (Blueprint $table) {
        $table->id('id_batimetri');
        $table->unsignedBigInteger('id_data');
        $table->unsignedBigInteger('id_analisis')->nullable();
        $table->text('pembahasan');
        $table->timestamps();

        $table->foreign('id_data')->references('id_data')->on('deskripsi_umums')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batrimetris');
    }
};
