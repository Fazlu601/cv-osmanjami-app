<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
    }

    public function Barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    public function Penjualan()
    {
        return $this->belongsToMany(Penjualan::class);
    }
}
