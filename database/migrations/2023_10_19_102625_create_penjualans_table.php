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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('barang_id');
            $table->string('no_po');
            $table->string('no_inv')->unique()->nullable();
            $table->decimal('qty', 8, 2);
            $table->bigInteger('total');
            $table->timestamps();
            $table->index('no_po');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
            $table->foreign('barang_id')->references('id')->on('barangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
