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
        Schema::create('data_rekening_koran', function (Blueprint $table) {
            $table->id();
            $table->string('bank');
            $table->string('nomor');
            $table->string('tanggal');
            $table->string('tipe');
            $table->string('nominal');
            $table->string('uraian');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_rekening_koran');
    }
};
