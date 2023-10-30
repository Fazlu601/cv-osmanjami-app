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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('invoice_id');
            $table->date('tanggal_pengiriman');
            $table->string('no_po');
            $table->string('no_do');
            $table->string('no_pol');
            $table->string('p');
            $table->string('l');
            $table->string('t');
            $table->decimal('qty/m3', 8, 2);
            $table->timestamps();
            $table->index('no_po');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
            $table->foreign('barang_id')->references('id')->on('barangs');
            $table->foreign('no_po')->references('no_po')->on('penjualans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
