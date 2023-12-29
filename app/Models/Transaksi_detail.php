<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_detail extends Model
{
    use HasFactory;
    protected $table = 'Transaksi_detail';
    protected $fillable = [
        'id_detail',
        'id_transaksi',
        'id_mobil'
    ];
}
