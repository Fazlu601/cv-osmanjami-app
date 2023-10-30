<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    
    public function index()
    {
        $data_pembayaran = Pembayaran::all();
        return view('dashboard.page.Pembayaran.index', [
            "title" => "Data Pembayaran",
            "data" => $data_pembayaran
        ]);
    }

}
