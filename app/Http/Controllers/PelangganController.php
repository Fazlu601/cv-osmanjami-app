<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    
    public function index()
    {
        $data = Pelanggan::all();
        return view('dashboard.page.pelanggan.index', [
            "title" => "Data Pelanggan",
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "nama_pelanggan" => ["required"],
            "alamat" => ["required"]
        ]);

        Pelanggan::create($validateData);

        return back()->with("success", "Berhasil Menambahkan Data Baru!");
    }

    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return back()->with("success", "Data Berhasil Dihapus!");
    }

}
