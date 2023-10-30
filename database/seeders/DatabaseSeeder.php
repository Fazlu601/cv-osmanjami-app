<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use App\Models\Delivery;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            "username" => "admin01",
            "email" => "admin@admin.com",
            "name" => "admin",
            "password" => Hash::make("admin")
        ]);
        User::create([
            "username" => "fazlu01",
            "email" => "fazrlu9575@gmail.com",
            "name" => "Fazlu Rachman",
            "level" => 3,
            "password" => Hash::make("12345")
        ]);

        Pelanggan::create([
            "nama_pelanggan" => "PT NINDYA BETON",
            "alamat" => "Gedung Nindya lt 3, Jl. Letjend Haryono MT Kav.22 Jakarta 13630"
        ]);

        Barang::create([
            "kode_barang" => "PSR",
            "nama_barang" => "PASIR",
            "harga/qty" => 130000
        ]);

        Penjualan::create([
            "tanggal" => "2023-06-23",
            "pelanggan_id" => 1,
            "barang_id" => 1,
            "no_po" => "163/PO/NB/BHN/5/2023",
            "no_inv" => "001/INV-PSR/OJM/V/23",
            "qty" => 212.00,
            "total" =>  2756000000
        ]);
        Penjualan::create([
            "tanggal" => "2023-06-27",
            "pelanggan_id" => 1,
            "barang_id" => 1,
            "no_po" => "163/PO/NB/BHN/5/2023",
            "no_inv" => "002/INV-PSR/OJM/V/23",
            "qty" => 329.77,
            "total" => 4287010000 
        ]);

        Delivery::create([
            "pelanggan_id" => 1,
            "barang_id" => 1,
            "invoice_id" => 1,
            "tanggal_pengiriman" => "2023-05-18",
            "no_po" => "163/PO/NB/BHN/5/2023",
            "no_do" => "706/DO-PSR/OJM/IX/23",
            "no_pol" => "BH 8861 DU",
            "p" => 420,
            "l" => 187,
            "t" => 90,
            "qty/m3" => 7.06
        ]);

        Pembayaran::create([
            "pelanggan_id" => 1,
            "tanggal_dibayar" => "2023-05-14",
            "nominal_dibayar" => 50000000
        ]);
        
    }
}
