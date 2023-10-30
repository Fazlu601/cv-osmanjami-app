<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    
    public function index()
    {
        $data = Barang::all();
        return view('dashboard.page.barang.index', [
            "title" => "Data barang",
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "kode_barang" => ["required"],
            "nama_barang" => ["required"],
            "harga/qty" => ["required"]
        ]);

        Barang::create($validateData);

        return back()->with("success", "Berhasil Menambahkan Data Baru!");
    }

    public function destroy($id)
    {
        Barang::destroy($id);
        return back()->with("success", "Data Berhasil Dihapus!");
    }

}
