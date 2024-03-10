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
        Schema::create('tbl_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kodeTransaksi');
            $table->unsignedBigInteger('costumerId');
            $table->unsignedBigInteger('jenisId');
            $table->decimal('harga', 20, 2);
            $table->bigInteger('qty');
            $table->string('keterangan', 100);
            $table->bigInteger('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_transaksi');
    }
};
