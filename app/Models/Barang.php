<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
    
    public function Delivery()
    {
        return $this->hasMany(Delivery::class);
    }


}
