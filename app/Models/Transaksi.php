<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tbl_transaksi';
    protected $fillable = [
        'kodeTransaksi',
        'costumer_id',
        'jenis_id',
        'berat',
        'keterangan',
        'total'
    ];

    function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }

    function jenis()
    {
        return $this->belongsTo(JenisCucian::class);
    }
}
