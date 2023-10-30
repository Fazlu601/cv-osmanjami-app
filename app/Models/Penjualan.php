<?php

namespace App\Models;

use NumberFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function generateInvoiceNumber()
    {
        $latestInvoice = static::latest()->first();
        if (!$latestInvoice) {
            return '001';
        }

        $parts = explode('/', $latestInvoice->no_inv);
        $number = str_pad((int)$parts[0] + 1, 3, '0', STR_PAD_LEFT);
        return $number;
    }

    public function intToRoman($num) {
        $romans = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        ];
    
        $result = '';
        
        foreach ($romans as $roman => $value) {
            $matches = intval($num / $value);
            $result .= str_repeat($roman, $matches);
            $num = $num % $value;
        }
    
        return $result;
    }

    public function Pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
    }

    public function Barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    public function Delivery()
    {
        return $this->belongsToMany(Delivery::class);
    }

    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

}
