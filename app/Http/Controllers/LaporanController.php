<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    
    public function laporanPembayaran(Request $request)
    {
        if($request->get('pelanggan_search')){
            $pelangganID = $request->get('pelanggan_search');
            $data_pelanggan = Pelanggan::all();
            $data_pembayaran = Pembayaran::where('pelanggan_id', $pelangganID)->get();
            $data_penjualan = Penjualan::where('pelanggan_id', $pelangganID)->get();
            $total_nominal = 0;
            $total_qty_penjualan = 0;
            foreach ($data_penjualan as $items) {
                    $total_nominal += $items->total;
                    $total_qty_penjualan += $items->qty;
            }
            return view('dashboard.page.laporan.pembayaran.index', [
                "data_pelanggan" => $data_pelanggan,
                "data_pembayaran" => $data_pembayaran,
                "total_nominal" => $total_nominal,
                "total_qty_penjualan" => $total_qty_penjualan
            ]);

        }else {
            $data_pelanggan = Pelanggan::all();
            return view('dashboard.page.laporan.pembayaran.index', [
                "data_pelanggan" => $data_pelanggan
            ]);

        }
    }

    public function laporanPengiriman(Request $request)
    {
        if($request->get('po_search')){
            $no_po = $request->get('po_search');
            $data_penjualan_poGroup = Penjualan::select('no_po')->groupBy('no_po')->get();
            $data_penjualan = Penjualan::where('no_po', $no_po)->get();
            $data_pengiriman = Delivery::select('tanggal_pengiriman', DB::raw("SUM(`qty/m3`) as total_qty"))->where('no_po', $no_po)->groupBy('tanggal_pengiriman')->get();

            $total_qty_penjualan = 0;
            foreach ($data_penjualan as $items) {
                    $total_qty_penjualan += $items->qty;
            }
            return view('dashboard.page.laporan.pengiriman.index', [
                "data_penjualan" => $data_penjualan_poGroup,
                "data_pengiriman" => $data_pengiriman,
                "total_qty_penjualan" => $total_qty_penjualan
            ]);
        }else {
            $data_penjualan = Penjualan::select('no_po')->groupBy('no_po')->get();
            return view('dashboard.page.laporan.pengiriman.index', [
                "data_penjualan" => $data_penjualan,
            ]);
        }
    }

    public function laporanPembayaranPDF(Request $request)
    {
        $pelangganID = $request->input('pelangganID');
        $data_pelanggan = Pelanggan::where('id', $pelangganID)->first();
        $data_pembayaran = Pembayaran::where('pelanggan_id', $pelangganID)->get();
        $data_penjualan = Penjualan::where('pelanggan_id', $pelangganID)->get();
        $total_nominal = 0;
        $total_qty_penjualan = 0;
        foreach ($data_penjualan as $items) {
                $total_nominal += $items->total;
                $total_qty_penjualan += $items->qty;
        }

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('dashboard.page.laporan.pembayaran.pdf', [
            "data_pelanggan" => $data_pelanggan,
            "data_pembayaran" => $data_pembayaran,
            "total_nominal" => $total_nominal,
            "total_qty_penjualan" => $total_qty_penjualan
         ]);
        return $pdf->stream();
    }

    public function laporanPengirimanPDF(Request $request)
    {
        $no_po = $request->input('no_po');

        $data_penjualan = Penjualan::where('no_po', $no_po)->get();
        $data_pengiriman = Delivery::select('tanggal_pengiriman', DB::raw("SUM(`qty/m3`) as total_qty"))->where('no_po', $no_po)->groupBy('tanggal_pengiriman')->get();
        $total_qty_penjualan = 0;
        foreach ($data_penjualan as $items) {
                $total_qty_penjualan += $items->qty;
        }

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('dashboard.page.laporan.pengiriman.pdf', [
            "data_penjualan" => $data_penjualan[0],
            "data_pengiriman" => $data_pengiriman,
            "total_qty_penjualan" => $total_qty_penjualan
         ]);
        return $pdf->stream();
    }


}
