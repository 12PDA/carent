<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'Transaksi';
    protected $fillable = [
        'id_customer',
        'status',
        'tgl_pinjam',
        'tgl_kembali',
        'tgl_update'
    ];
}
