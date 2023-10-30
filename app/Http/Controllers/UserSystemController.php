<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSystemController extends Controller
{
    
    public function index()
    {
        $data_pengguna = User::all();
        return view('dashboard.page.pengguna.index', [
            "title" => "Pengguna Sistem",
            "data_pengguna" => $data_pengguna
        ]);
    }

}
