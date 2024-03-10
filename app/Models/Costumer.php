<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;
    protected $table = 'tbl_costumer';
    protected $fillable = [
        'name',
        'noTelp',
        'alamat'
    ];
}
