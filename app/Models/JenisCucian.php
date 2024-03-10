<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCucian extends Model
{
    use HasFactory;
    protected $table = 'tbl_jenis_cucian';
    protected $fillable = [
        'name',
        'harga',
    ];
}
