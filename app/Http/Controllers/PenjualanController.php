<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Delivery;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    
    public function index()
    {
        $data_penjualan = Penjualan::all();
        $data_pelanggan = Pelanggan::all();
        $data_barang= Barang::all();
        return view('dashboard.page.penjualan.index', [
            "title" => "Data Penjualan",
            "data_penjualan" => $data_penjualan,
            "data_pelanggan" => $data_pelanggan,
            "data_barang" => $data_barang
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
             "tanggal" => "required|date",
             "pelanggan_id" => "required",
             "barang_id" => "required",
             "no_po" => "required",
             "qty" => "required",
        ]);

        $penjualan = new Penjualan(); // Inisiasi objek model
        $now = Carbon::now();
        $duaDigitTerakhirTahun = $now->format("y");
        $bulanAngka = $now->format('n'); // 'n' mengembalikan bulan dalam angka (1-12)
        $bulanRomawi = $penjualan->intToRoman($bulanAngka);
        $invoiceNumber = $penjualan->generateInvoiceNumber(); // Panggil metode pada objek
        
        $barang = Barang::where('id', $validateData['barang_id'])->first();
        $validateData['no_inv'] = $invoiceNumber . '/INV-' . $barang->kode_barang . '/OJM/' . $bulanRomawi . '/' . $duaDigitTerakhirTahun;
        $validateData['total'] = $barang['harga/qty'] * $validateData['qty'];
        
        Penjualan::create($validateData);

        return back()->with("success", "Data Penjualan Berhasil Ditambahkan!");
        
    }

    public function show($id)
    {
        $penjualan = Penjualan::where('id', $id)->first();
        $pengiriman = Delivery::where('no_po', $penjualan->no_po)->get();
        return view('dashboard.page.penjualan.detailPengiriman', [
            "title" => "Detail Penjualan",
            "data_penjualan" => $penjualan,
            "data_pengiriman" => $pengiriman,
        ]);
    }

    public function generatePDF($id)
    {
        $penjualan = Penjualan::where('id', $id)->first();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('dashboard.page.penjualan.invoicePDF', ['data' => $penjualan ]);
        return $pdf->stream();
    }

}
