<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    
    public function index()
    {
        $data = Delivery::all();
        return view('dashboard.page.pengiriman.index', [
            "title" => "Data Pengiriman",
            "data" => $data
        ]);
    }

    public function show($id)
    {
        $data_deliver = Delivery::where('id', $id)->first();
        return view('dashboard.page.pengiriman.detail', [
            "data" => $data_deliver
        ]);
    }

}
