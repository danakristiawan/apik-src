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
        Schema::create('bku', function (Blueprint $table) {
            $table->id();
            $table->string('kdsatker');
            $table->string('no_rekening');
            $table->date('tanggal');
            $table->string('bukti');
            $table->string('uraian');
            $table->decimal('debet');
            $table->decimal('kredit');
            $table->decimal('saldo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bku');
    }
};
